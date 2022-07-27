<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'nama' => 'Ridho',
                'email' => 'ridho@gmail.com',
                'level' => 'user',
                'password' => bcrypt('123456'),
            ],
            [
                'nama' => 'Nathan',
                'email' => 'nathan@gmail.com',
                'level' => 'user',
                'password' => bcrypt('123456'),
            ],
            [
                'nama' => 'Faraz',
                'email' => 'faraz@gmail.com',
                'level' => 'user',
                'password' => bcrypt('123456'),
            ]
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
