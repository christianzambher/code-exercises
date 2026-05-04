<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Un solo registro de ejemplo
        // $data = [
        //     'name'  => 'Admin',
        //     'email' => 'admin@test.com',
        //     'created_at' => date('Y-m-d H:i:s')
        // ];

        // $this->db->table('users')->insert($data);
    
        // Múltiples registros de ejemplo
        // for ($i=0; $i < 10; $i++) { 
        //     $this->db->table('users')->insert([
        //         'name' => "Usuario $i",
        //         'email' => "user$i@test.com",
        //         'created_at' => date('Y-m-d H:i:s')
        //     ]);
        // }

        // Usando Faker para datos aleatorios
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $this->db->table('users')->insert([
                'name'  => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
