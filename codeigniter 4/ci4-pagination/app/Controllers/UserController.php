<?php
namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $model = new UserModel();

        $search = $this->request->getGet('search');
        if ($search) {
            $model->like('name', $search)
                ->orLike('email', $search);
        }

        $from = $this->request->getGet('from');
        if ($from) {
            $model->where('created_at >=', $from);
        }

        $data = [
            'users' => $model->paginate($model->perPage),
            'pager' => $model->pager,
            'search' => $search,
            'from' => $from,
        ];

        return view('users/index', $data);
    }
}