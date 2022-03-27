<?php 
namespace App\Controllers;

use App\Database\Migrations\Brand;
use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use Exception;

class ProductController extends BaseController
{
    public function index()
    {
        $data = array();

        $data['status_options'] = [
            'all' => 'ALL',
            'published' => 'PUBLISHED',
            'draft' => 'DRAFT',
        ];
        $data['selected_status'] = "all";

        $status = $this->request->getGet('status');
        $limit = $this->request->getGet('limit');

        $productModel = new ProductModel();

        if ($status != null && $status != '' && $status != 'all') {
            $productModel->where('status', $status);
            $data['selected_status'] = $status;
        }

        if($limit == null)
        {
            $limit = 10;
        }
        $data['limit'] = $limit;

        $productModel->join("categories","categories.id = products.category_id");
        $productModel->join("brands","brands.id = products.brand_id");
        $productModel->select("products.id,products.title,products.short_description,products.price,products.image,products.publish_status,categories.name as category_name,brands.name as brand_name");
        $products = $productModel->paginate($limit,"products");

        $data['products'] = $products;
        $data['pager'] = $productModel->pager;
        return view('admin/product',$data);
    }

    public function publish($productId)
    {
        try {
            $productModel = new ProductModel();

            $product = $productModel->find($productId);

            $this->GuardNull($product);

            $product["publish_status"] = "published";

            $productModel->update($productId,$product);

            return redirect('admin/products');
        }catch(Exception $e)
        {
            dd($e->getMessage());
        }
    }

    public function draft($productId)
    {
        try {
            $productModel = new ProductModel();

            $product = $productModel->find($productId);

            $this->GuardNull($product);

            $product["publish_status"] = "draft";

            $productModel->update($productId,$product);

            return redirect('admin/products');
        }catch(Exception $e)
        {
            dd($e->getMessage());
        }
    }

    public function product_detail($id)
    {
        try {
            $productModel = new ProductModel();

            $productModel->where("products.id",$id);
            $productModel->join("categories","categories.id = products.category_id");
            $productModel->join("brands","brands.id = products.brand_id");
            $productModel->select("products.id,products.title,products.short_description,products.long_description,products.price,products.image,products.quantity,products.publish_status,categories.name as category_name,brands.name as brand_name");
            $productsDetail  = $productModel->first();

            $data["product"] = $productsDetail;

            return view("admin/product_detail",$data);

        }catch(Exception $ex)
        {
            return redirect("/");
        }
    }

    /**
     * @param $product
     * @return void
     * @throws Exception
     */
    public function GuardNull($product): void
    {
        if ($product == null) {
            throw new Exception("Product not found");
        }
    }


    public function add()
    {
        $data['status_options'] = [
            'published' => 'PUBLISHED',
            'draft' => 'DRAFT',
        ];
        $data['selected_status'] = "draft";

        $categoryModel = new CategoryModel();
        $brandModel = new BrandModel();

        $categoryDropDown = array();
        $brandDropDown = array();

        $categories = $categoryModel->findAll();
        $brands = $brandModel->findAll();

        foreach($categories as $category)
        {
            $categoryDropDown[] = [
                $category["id"] => $category["name"]
            ];
        }

        foreach($brands as $brand)
        {
            $brandDropDown[] = [
                $brand["id"] => $brand["name"]
            ];
        }
        $data['category_options'] =$categoryDropDown;
        $data['brand_options'] =$brandDropDown;

        return view('admin/add_product',$data);
    }

    public function create()
    {
        try {
            $productModel = new ProductModel();


            $file = $this->validate([
                'file' => [
                    'uploaded[file]',
                    'max_size[file,102,400]',
                ]
            ]);

            if (!$file) {
                print_r('Wrong file type selected');
            } else {
                $imageFile = $this->request->getFile('file');
                $imageFile->move("web/img/uploads/");
                $fileName = $imageFile->getName();

                $postData = $this->GetProductPostData($productModel,$fileName);

                $productModel->insert($postData);
            }


            return redirect('admin/products');
        }catch(Exception $e)
        {
            dd($e->getMessage());
        }
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

    public function edit($productId)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($productId);

        $data['status_options'] = [
            'published' => 'PUBLISHED',
            'draft' => 'DRAFT',
        ];
        $data['selected_status'] = $product["publish_status"];

        $categoryModel = new CategoryModel();
        $brandModel = new BrandModel();

        $categoryDropDown = array();
        $brandDropDown = array();

        $categories = $categoryModel->findAll();
        $brands = $brandModel->findAll();

        foreach($categories as $category)
        {
            $categoryDropDown[] = [
                $category["id"] => $category["name"]
            ];
        }

        foreach($brands as $brand)
        {
            $brandDropDown[] = [
                $brand["id"] => $brand["name"]
            ];
        }
        $data['category_options'] =$categoryDropDown;
        $data['brand_options'] =$brandDropDown;

        $data['product'] = $product;
        return view('admin/edit_product',$data);
    }

    public function GetProductPostDataForEdit(ProductModel $model,$imageName): array
    {
        $id = $this->request->getVar('id', FILTER_SANITIZE_NUMBER_INT);
        $data = $this->GetProductPostData($model,$imageName);
        $data["id"] = $id;
        return $data;
    }

    public function update()
    {
        try {
            $productModel = new ProductModel();

            $file = $this->validate([
                'file' => [
                    'uploaded[file]',
                    'max_size[file,102,400]',
                ]
            ]);

            if (!$file) {
                print_r('Wrong file type selected');
            } else {
                $imageFile = $this->request->getFile('file');
                if($imageFile != null){
                    $imageFile->move("web/img/uploads/");
                    $fileName = $imageFile->getName();
                }else{
                    $fileName = $this->request->getVar('image', FILTER_SANITIZE_STRING);
                }

                $postData = $this->GetProductPostDataForEdit($productModel, $fileName);
                $productId = $postData['id'];
                $product = $productModel->find($productId);

                $this->GuardNull($product);
                $brand = $postData;
                $productModel->update($productId, $brand);
            }
            return redirect('admin/products');
        }catch(Exception $e)
        {
            dd($e->getMessage());
        }
    }

    public function delete($productId)
    {
        try {
            $productModel = new ProductModel();

            $brand = $productModel->find($productId);

            $this->GuardNull($brand);

            $productModel->delete($productId);

            return redirect('admin/products');
        }catch(Exception $e)
        {
            dd($e->getMessage());
        }
    }
}