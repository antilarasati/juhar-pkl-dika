<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
               'username' => 'admin1',
                'password' => bcrypt('password123'),
                'nama_admin' => 'Admin1',
                'forto' => null, 
            ],

            [
                'username' => 'admin2',
                'password' => bcrypt('password123'),
                'nama_admin' => 'Admin2',
                'forto' => null,
            ]
            ];

            
    }
}
