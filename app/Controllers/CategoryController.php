<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends BaseController
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

        $categoryModel = new CategoryModel();

        if ($status != null && $status != '' && $status != 'all') {
            $categoryModel->where('status', $status);
            $data['selected_status'] = $status;
        }

        if($limit == null)
        {
            $limit = 10;
        }
        $data['limit'] = $limit;


        $data['categories'] = $categoryModel->paginate($limit,"categories");
        $data['pager'] = $categoryModel->pager;
        return view('admin/category',$data);
    }
}
