<?php

namespace App\Controllers;


class EditorController extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "editor") {
            echo 'Access denied';
            exit;
        }
    }
    public function index()
    {
        return view("editor/dashboard");
    }
}
