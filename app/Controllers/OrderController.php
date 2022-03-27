<?php

namespace App\Controllers;

use App\Models\OrderDetailModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\UserModel;

class OrderController extends BaseController
{
    public function buy()
    {
        $productModel = new ProductModel();
        $userModel = new UserModel();
        $orderModel = new OrderModel();
        $orderDetailModel = new OrderDetailModel();


        $product_id = $this->request->getVar('product_id',FILTER_SANITIZE_NUMBER_INT);
        $quantity = $this->request->getVar('quantity', FILTER_SANITIZE_NUMBER_INT);

        $product = $productModel->find($product_id);

        $customer_id  = session()->get("id");

        $currentOrder = $orderModel->where("customer_id",$customer_id)->first();
        $customerHasOrder = $currentOrder != null;

        var_dump($customerHasOrder);

        $total = $product["price"] * $quantity;


        if($customerHasOrder){
            $order_id = $currentOrder["id"];
            $orderModel->update($currentOrder["id"],array("order_total"=> $currentOrder["order_total"]+ $product["price"] * $quantity));
        }else{
            $order_id = $orderModel->insert(array(
                "customer_id" => $customer_id,
                "order_total" => $product["price"] * $quantity,
                "actions" => "pending"
        ));
        }

        $orderDetailModel->insert(array(
            "order_id" => $order_id,
            "product_id" => $product_id,
            "product_name" => $product["title"],
            "product_price" => $product["price"],
            "sales_quantity" => $quantity,
            "product_image" =>  $product["image"],
        ));

        return redirect("web/cart");
    }

    public function GetProductPostData(ProductModel $model,$imageName): array
    {
        $image = $imageName;
        $title = $this->request->getVar('title', FILTER_SANITIZE_STRING);
        $code = $this->request->getVar('code', FILTER_SANITIZE_STRING);
        $short_description = $this->request->getVar('short_description', FILTER_SANITIZE_STRING);
        $long_description = $this->request->getVar('long_description', FILTER_SANITIZE_STRING);
        $price = $this->request->getVar('price', FILTER_SANITIZE_NUMBER_INT);
        $quantity = $this->request->getVar('quantity', FILTER_SANITIZE_NUMBER_INT);
        $category_id = $this->request->getVar('category_id', FILTER_SANITIZE_NUMBER_INT);
        $brand_id = $this->request->getVar('brand_id', FILTER_SANITIZE_NUMBER_INT);
        $publish_status = $this->request->getVar('publish_status', FILTER_SANITIZE_STRING);

        return array(
            'image' =>$image,
            'title' =>$title,
            'code' =>$code,
            'price' =>$price,
            'quantity' =>$quantity,
            'category_id' =>$category_id,
            'brand_id' =>$brand_id,
            'short_description' =>$short_description,
            'long_description' =>$long_description,
            'publish_status' => $publish_status
        );
    }
}
