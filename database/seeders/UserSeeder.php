<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Yunus Emre',
            'last_name' => 'er',
            'avatar' => 'user.png',
            'email' => 'emre@gmail.com',
            'password' => Hash::make('123123qwe'),
            'role' => 'admin'
        ]);
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Role',
            'avatar' => 'user.png',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123123qwe'),
            'role' => 'admin'
        ]);
        User::create([
            'first_name' => 'Editor',
            'last_name' => 'Role',
            'avatar' => 'user.png',
            'email' => 'editor@gmail.com',
            'password' => Hash::make('123123qwe'),
            'role' => 'editor'
        ]);
        User::create([
            'first_name' => 'User',
            'last_name' => 'Role',
            'avatar' => 'user.png',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123123qwe'),
            'role' => 'user'
        ]);

        // User::factory(10)->create();
    }
}
