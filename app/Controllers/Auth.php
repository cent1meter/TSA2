<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class Auth extends BaseController
{
    protected $helpers = ['form', 'url'];

    public function login(): string|RedirectResponse
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/tasks');
        }

        return view('auth/login', ['title' => 'Login']);
    }

    public function attemptLogin(): RedirectResponse
    {
        $data = [
            'username' => trim((string) $this->request->getPost('username')),
            'password' => (string) $this->request->getPost('password'),
        ];

        $rules = [
            'username' => 'required|max_length[50]',
            'password' => 'required|max_length[255]',
        ];

        if (! $this->validateData($data, $rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $user = (new UserModel())->where('username', $data['username'])->first();

        if ($user === null || empty($user['password']) || ! password_verify($data['password'], $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'The username or password is incorrect.');
        }

        session()->regenerate(true);
        session()->set([
            'user_id' => $user['id'],
            'username' => $user['username'],
            'full_name' => $user['full_name'],
            'logged_in' => true,
        ]);

        $destination = session()->get('intended_url') ?: site_url('tasks');
        session()->remove('intended_url');

        return redirect()->to($destination)->with('success', 'Welcome back, ' . $user['full_name'] . '.');
    }

    public function logout(): RedirectResponse
    {
        session()->remove(['user_id', 'username', 'full_name', 'logged_in', 'intended_url']);
        session()->regenerate(true);

        return redirect()->to('/login')->with('success', 'You have been logged out.');
    }
}
