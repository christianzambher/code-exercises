<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();

        return view('users/index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        $userModel = new UserModel();

        $userModel->insert([
            'name'  => 'Nuevo Usuario',
            'email' => 'nuevo@test.com',
        ]);

        return redirect()->to('/users');
    }

    public function update($id)
    {
        $userModel = new UserModel();

        $userModel->update($id, [
            'name' => 'Usuario Actualizado'
        ]);

        return redirect()->to('/users');
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);

        return redirect()->to('/users');
    }
}
