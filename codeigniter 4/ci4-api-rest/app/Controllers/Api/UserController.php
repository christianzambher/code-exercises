<?php
namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class UserController extends ResourceController
{
    protected $modelName = UserModel::class;
    protected $format    = 'json';
}


