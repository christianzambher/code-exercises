<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'email',
    ];

    protected $useTimestamps = true;

    protected $validationRules = [
        'name'  => 'required|min_length[3]',
        'email' => 'required|valid_email|is_unique[users.email]',
    ];
    public function getByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
