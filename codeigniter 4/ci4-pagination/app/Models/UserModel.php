<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['name', 'email', 'created_at'];
    protected $useTimestamps = true;
    protected $perPage = 10;
}
