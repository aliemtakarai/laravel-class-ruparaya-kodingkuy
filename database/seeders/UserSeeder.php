<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'name' => 'User1',
        //     'email' => 'user1@mail.com',
        //     'password' => bcrypt('password')
        // ]);

        // User::insert([
        //     [
        //         'name' => 'User2',
        //         'email' => 'user2@mail.com',
        //         'password' => bcrypt('password')
        //     ],
        //     [
        //         'name' => 'User3',
        //         'email' => 'user3@mail.com',
        //         'password' => bcrypt('password')
        //     ],
        //     [
        //         'name' => 'User4',
        //         'email' => 'user4@mail.com',
        //         'password' => bcrypt('password')
        //     ]   
        // ]);

        // $user = new User;
        // $user->name = 'User5';
        // $user->email = 'user5@mail.com';
        // $user->password = bcrypt('password');
        // $user->save();

        User::factory(100)->create();

    }
}
