<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    protected $helpers = ['url'];

    public function index(): string
    {
        $customerModel = new CustomerModel();

        return view('customers/index', [
            'title'     => 'Customer Accounts',
            'customers' => $customerModel->orderBy('id', 'ASC')->findAll(),
        ]);
    }
}
