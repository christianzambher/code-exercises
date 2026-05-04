<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController 
{
    public function login()
    {
        return view('auth/login');
    }

    public function authenticate()
    {
        $userModel = new UserModel();

        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if (! $user || ! password_verify($password, $user['password'])) {
            return redirect()->back()
                ->with('error', 'Credenciales inválidas')
                ->withInput();
        }

        session()->set([
            'user_id'   => $user['id'],
            'user_name' => $user['name'],
            'logged_in' => true,
        ]);

        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}