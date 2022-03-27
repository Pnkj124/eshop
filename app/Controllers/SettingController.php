<?php
namespace App\Controllers;

class SettingController extends BaseController
{
    public  function index()
    {
        return view("admin/setting");
    }
}