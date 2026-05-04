<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => password_hash('123456', PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
