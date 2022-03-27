<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\OrderDetailModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use Exception;

class HomeController extends BaseController
{
    public function index()
    {
        $data = array();

        $categoryModel = new CategoryModel();

        $categories = $this->getCategories($categoryModel);

        $productModel = new ProductModel();

        $productModel->join("categories","categories.id = products.category_id");
        $productModel->join("brands","brands.id = products.brand_id");
        $productModel->select("products.id,products.title,products.short_description,products.long_description,products.price,products.image,products.code,products.quantity,products.publish_status,categories.name as category_name,brands.name as brand_name");

        $products = $productModel->findAll();

        $data["categories"] = $categories;
        $data["products"] = $products;

        return view('web/home',$data);
    }

    public function products($category_code)
    {
        try {
            $categoryModel = new CategoryModel();
            $productModel = new ProductModel();
            $brandModel = new BrandModel();

            $categories = $this->getCategories($categoryModel);

            $category = $categoryModel->where("code",$category_code)->first();

            if($category == null)
            {
                throw new Exception("Category not found exception");
            }

            $productModel->where("category_id",$category["id"]);
            $productModel->join("categories","categories.id = products.category_id");
            $productModel->join("brands","brands.id = products.brand_id");
            $productModel->select("products.id,products.title,products.short_description,products.long_description,products.price,products.image,products.code,products.quantity,products.publish_status,categories.name as category_name,brands.name as brand_name");
            $products = $productModel->findAll();

            $data["products"] = $products;
            $data["categories"] = $categories;

            return view("web/category_single",$data);

        }catch(Exception $ex)
        {
            return redirect("/");
        }
    }

    /**
     * @param CategoryModel $categoryModel
     * @return array
     */
    public function getCategories(CategoryModel $categoryModel): array
    {
        $parents = $categoryModel->where("parent_category_id", NULL)->findAll();

        $categories = array();

        foreach ($parents as $parent) {
            $parentId = $parent["id"];

            $allChildren = $categoryModel->where('parent_category_id', $parentId)->findAll();

            $children = array();

            foreach ($allChildren as $child) {
                $childId = $child["id"];

                $grandChildren = $categoryModel->where('parent_category_id', $childId)->findAll();

                $children[] = [
                    "id" => $childId,
                    "name" => $child["name"],
                    "code" => $child["code"],
                    "children" => $grandChildren,
                    "hasChild" => count($grandChildren) > 0,
                ];
            }
            $categories[] = [
                "id" => $parentId,
                "name" => $parent["name"],
                "code" => $parent["code"],
                "children" => $children,
                "hasChild" => count($children) > 0,
            ];
        }
        return $categories;
    }

    /**
     * @param array $allProducts
     * @param CategoryModel $categoryModel
     * @param BrandModel $brandModel
     * @return array
     */
    public function getProducts(array $allProducts, CategoryModel $categoryModel, BrandModel $brandModel): array
    {
        $products = array();

        foreach ($allProducts as $product) {
            $categoryId = $product["category_id"];
            $category = $categoryModel->find($categoryId);
            $brandId = $product["brand_id"];
            $brand = $brandModel->find($brandId);


            $products[] = [
                "id" => $product["id"],
                "title" => $product["title"],
                "code" => $product["code"],
                "short_description" => $product["short_description"],
                "price" => $product["price"],
                "quantity" => $product["quantity"],
                "image" => $product["image"],
                "category_id" => $categoryId,
                "category_name" => $category["name"],
                "category_code" => $category["code"],
                "brand_id" => $brandId,
                "brand_name" => $brand["name"],
            ];
        }
        return $products;
    }


    public function product_detail($code)
    {
        try {
            $categoryModel = new CategoryModel();
            $productModel = new ProductModel();
            $brandModel = new BrandModel();

            $categories = $this->getCategories($categoryModel);

            $product = $productModel->where("code",$code)->first();

            $categoryId = $product["category_id"];
            $category = $categoryModel->find($categoryId);
            $brandId = $product["brand_id"];
            $brand = $brandModel->find($brandId);

            $productsDetail = [
                "id" => $product["id"],
                "title" => $product["title"],
                "code" => $product["code"],
                "long_description" => $product["long_description"],
                "price" => $product["price"],
                "quantity" => $product["quantity"],
                "image" => $product["image"],
                "category_id" => $categoryId,
                "category_name" => $category["name"],
                "category_code" => $category["code"],
                "brand_id" => $brandId,
                "brand_name" => $brand["name"],
            ];

            $data["product"] = $productsDetail;
            $data["categories"] = $categories;

            return view("web/product_single",$data);

        }catch(Exception $ex)
        {
            return redirect("/");
        }
    }

    public function register()
    {
        $categoryModel = new CategoryModel();
        $categories = $this->getCategories($categoryModel);
        $data["categories"] = $categories;
        return view("register",$data);
    }

    public  function login()
    {
        $categoryModel = new CategoryModel();
        $categories = $this->getCategories($categoryModel);
        $data["categories"] = $categories;
        return view("web_login",$data);
    }

    public function cart()
    {
        try {
            $categoryModel = new CategoryModel();
            $orderModel = new OrderModel();
            $orderDetailModel = new OrderDetailModel();

            $customer_id = session()->get("id");

            if($customer_id <= 0)
            {
                throw new Exception("Current use not logged.");
            }

            $currentOrder = $orderModel->where("customer_id",$customer_id)->first();

            $data["order"] = null;
            $data["order_details"] = null;

            if($currentOrder != null)
            {
                $data["order"] = $currentOrder;

                $orderDetails = $orderDetailModel->where("order_id",$currentOrder["id"])->findAll();

                $data["order_details"] = $orderDetails;
            }

            $categories = $this->getCategories($categoryModel);
            $data["categories"] = $categories;

            return view("web/cart",$data);
        }catch(Exception $ex)
        {
            dd($ex);
            return redirect("/");
        }
    }

    public function update_order_item($detail_id)
    {
        try {
            $orderItemModel = new OrderDetailModel();
            $orderModel = new OrderModel();

            $newQuantity = $this->request->getVar('quantity', FILTER_SANITIZE_NUMBER_INT);

            $orderItem = $orderItemModel->find($detail_id);

            $oldquantity = $orderItem["sales_quantity"];

            $orderId = $orderItem["order_id"];

            $order = $orderModel->find($orderId);

            $oldAmount = $oldquantity * $orderItem["product_price"];
            $newAmount = $newQuantity * $orderItem["product_price"];

            $orderItemModel->update($detail_id,array("sales_quantity" => $newQuantity));


            $orderModel->update($orderId,array("order_total" => $order["order_total"]-$oldAmount + $newAmount));
            return redirect("web/cart");
        }catch(Exception $ex){
            dd($ex);
            return redirect("/");
        }
    }

    public function remove_order_item($detail_id)
    {
        try {
            $orderItemModel = new OrderDetailModel();
            $orderModel = new OrderModel();

            $orderItem = $orderItemModel->find($detail_id);
            $oldquantity = $orderItem["sales_quantity"];

            $orderId = $orderItem["order_id"];

            $order = $orderModel->find($orderId);

            $oldAmount = $oldquantity * $orderItem["product_price"];

            $orderItemModel->delete($detail_id);

            $orderModel->update($orderId,array("order_total" => $order["order_total"]-$oldAmount));
            return redirect("web/cart");
        }catch(Exception $ex)
        {
            return redirect('/');
        }

    }
}
