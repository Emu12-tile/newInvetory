<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user1 =  User::create([
        //     'name' => 'admin',
        //     'email' => 'tileyeemu@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password

        // ]);
        // $user2 =  User::create([
        //     'name' => 'head',
        //     'email' => 'emuaniley@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$IaiNYkf3WLBNCHNG.9dSKO34Olha0EZTTziJISVelzE86Th3aW9GK', // 123456789

        // ]);


        // $user3 =  User::create([
        //     'name' => 'employee',
        //     'email' => 'user@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$IaiNYkf3WLBNCHNG.9dSKO34Olha0EZTTziJISVelzE86Th3aW9GK', // 123456789
        // ]);
        // $user1->assignRole('admin');
        // $user2->assignRole('head');
        // $user3->assignRole('employee');
    }
}
