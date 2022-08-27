<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'fname'           => 'Test',
                'lname'          => 'User',
                'email'          => 'test@adivid.com',
                'mobile'         => '999999999',
                'password'       => '$2y$10$MpxRwnNxj1uMrOojL.ptFOAg.awAdJZB1oNlOfaiVrLXLGyDIBhaC',
                'remember_token' => null,
                'team_id'        => '1',
            ],
        ];

        $users1 = [
            [
                'id'             => 2,
                'fname'           => 'Test',
                'lname'          => 'Member',
                'email'          => 'member@adivid.com',
                'mobile'         => '8888888888',
                'password'       => '$2y$10$MpxRwnNxj1uMrOojL.ptFOAg.awAdJZB1oNlOfaiVrLXLGyDIBhaC',
                'remember_token' => null,
                'team_id'        => '1',
            ],
        ];

        User::insert($users);
        User::insert($users1);

    }
}
