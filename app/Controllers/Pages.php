<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Pages extends BaseController
{
    protected $helpers = ['url'];

    public function home(): string
    {
        $taskModel = new TaskModel();

        return view('pages/home', [
            'title' => 'Home',
            'tasks' => $taskModel->activeTasks(3),
        ]);
    }

    public function about(): string
    {
        return view('pages/about', [
            'title' => 'About',
        ]);
    }

    public function profile(): string
    {
        return view('pages/profile', [
            'title' => 'Profile',
        ]);
    }
}
