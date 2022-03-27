<?php

namespace App\Controllers;

use App\Models\BrandModel;
use Exception;

class BrandController extends BaseController
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

        $brands = new BrandModel();

        if ($status != null && $status != '' && $status != 'all') {
            $brands->where('status', $status);
            $data['selected_status'] = $status;
        }

        if($limit == null)
        {
            $limit = 10;
        }
        $data['limit'] = $limit;


        $data['brands'] = $brands->paginate($limit,"brands");
        $data['pager'] = $brands->pager;
        return view('admin/brand',$data);
    }

    public function publish($brandId)
    {
        try {
            $brandModel = new BrandModel();

            $brand = $brandModel->find($brandId);

            $this->GuardNull($brand);

            $brand["status"] = "published";

            $brandModel->update($brandId,$brand);

            return redirect('admin/brands');
        }catch(Exception $e)
        {
            dd($e->getMessage());
        }
    }

    public function draft($brandId)
    {
        try {
            $brandModel = new BrandModel();

            $brand = $brandModel->find($brandId);

            $this->GuardNull($brand);

            $brand["status"] = "draft";

            $brandModel->update($brandId,$brand);

            return redirect('admin/brands');
        }catch(Exception $e)
        {
            dd($e->getMessage());
        }
    }

    public function add()
    {
        $data['status_options'] = [
            'published' => 'PUBLISHED',
            'draft' => 'DRAFT',
        ];
        $data['selected_status'] = "draft";
        return view('admin/add_brand',$data);
    }

    public function create()
    {
        try {
            $brandModel = new BrandModel();

            $postData = $this->GetBrandPostData($brandModel);

            $brandModel->insert($postData);

            return redirect('admin/brands');
        }catch(Exception $e)
        {
            dd($e->getMessage());
        }
    }

    public function edit($brandId)
    {
        $brandModel = new BrandModel();
        $brand = $brandModel->find($brandId);

        $data['status_options'] = [
            'published' => 'PUBLISHED',
            'draft' => 'DRAFT',
        ];
        $data['selected_status'] = $brand["status"];

        $data['brand'] = $brand;
        return view('admin/edit_brand',$data);
    }


    public function GetBrandPostData(BrandModel $model): array
    {
        $name = $this->request->getVar('name', FILTER_SANITIZE_STRING);
        $description = $this->request->getVar('description', FILTER_SANITIZE_STRING);
        $status = $this->request->getVar('status', FILTER_SANITIZE_STRING);

        return array(
            'name' =>$name,
            'description' =>$description,
            'status' => $status
        );
    }

    public function GetBrandPostDataForEdit(BrandModel $model): array
    {
        $id = $this->request->getVar('id', FILTER_SANITIZE_NUMBER_INT);
        $data = $this->GetBrandPostData($model);
        $data["id"] = $id;
        return $data;
    }


    public function update()
    {
        try {
            $brandModel = new BrandModel();

            $postData = $this->GetBrandPostDataForEdit($brandModebl);
            $brandId = $postData['id'];
            $brand = $brandModel->find($brandId);

            $this->GuardNull($brand);
            $brand = $postData;
            $brandModel->update($brandId,$brand);

            return redirect('admin/brands');
        }catch(Exception $e)
        {
            dd($e->getMessage());
        }
    }

    public function delete($brandId)
    {
        try {
            $brandModel = new BrandModel();

            $brand = $brandModel->find($brandId);

            $this->GuardNull($brand);

            $brandModel->delete($brandId);

            return redirect('admin/brands');
        }catch(Exception $e)
        {
            dd($e->getMessage());
        }
    }

    /**
     * @param $brand
     * @return void
     * @throws Exception
     */
    public function GuardNull($brand): void
    {
        if ($brand == null) {
            throw new Exception("Brand not found");
        }
    }
}
