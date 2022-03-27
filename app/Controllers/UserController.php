<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function login()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Email or Password didn't match",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('login', [
                    "validation" => $this->validator,
                ]);

            } else {
                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();

                // Storing session values
                $this->setUserSession($user);

                // Redirecting to dashboard after login
                if($user['role'] == "admin"){
                    return redirect()->to(base_url('admin'));
                }
                elseif($user['role'] == "editor"){
                    return redirect()->to(base_url('editor'));
                }
                elseif($user['role'] == "user"){
                    return redirect()->to(base_url('/'));
                }
            }
        }
        return view('login');
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'name' => $user['name'],
            'phone_number' => $user['phone_number'],
            'email' => $user['email'],
            'isLoggedIn' => true,
            "role" => $user['role'],
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }

    public function user_logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }


    public function register_user()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|uniqueEmail[email]',
            'phone_number' => 'required|min_length[8]|max_length[8]',
            'address' => 'required|min_length[3]|max_length[120]',
            'password' => 'required|min_length[5]|max_length[255]',
            'confirm_password' => 'required|min_length[5]|max_length[255]|matches[password]',
        ];

        $errors = [
            'email' => [
                'uniqueEmail' => "User with that email already exists.",
            ],
        ];

        if (!$this->validate($rules, $errors)) {

            $categoryModel = new CategoryModel();
            $categories = $this->getCategories($categoryModel);

            return view('register', [
                "validation" => $this->validator,
                "categories" => $categories
            ]);

        } else {
            $model = new UserModel();

            $userDetail = array(
                "name" =>  $this->request->getVar('name',FILTER_SANITIZE_STRING),
                "email" =>  $this->request->getVar('email',FILTER_VALIDATE_EMAIL),
                "phone_number" =>  $this->request->getVar('phone_number'),
                "address" =>  $this->request->getVar('address'),
                "status" =>  "Active",
                "password" =>  password_hash($this->request->getVar('password',FILTER_SANITIZE_STRING), PASSWORD_DEFAULT),
            );


            $userId = $model->insert($userDetail);

            $user = $model->find($userId);

            $this->setUserSession($user);

            return redirect()->to(base_url('/'));
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
}
