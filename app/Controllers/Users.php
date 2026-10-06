<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    protected $helpers = ['url'];

    public function index(): string
    {
        $userModel = new UserModel();

        return view('users/index', [
            'title' => 'User Accounts',
            'users' => $userModel->orderBy('id', 'ASC')->findAll(),
        ]);
    }
}
