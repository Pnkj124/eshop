<?php namespace App\Controllers;

use App\Models\TransactionModel;

class DashboardController extends BaseController
{
	public function index()
	{
		return view('admin/dashboard');
	}
}
