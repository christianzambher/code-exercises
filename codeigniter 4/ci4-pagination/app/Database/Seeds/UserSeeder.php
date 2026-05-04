<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
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
