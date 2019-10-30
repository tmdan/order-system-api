<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    public function run()
    {
        User::firstOrCreate([
            'name'           => 'Мухаммед',
            'email'          => env("ADMIN_EMAIL",'admin@admin.com'),
            'password'       => bcrypt(env("ADMIN_PASSORD",'@password')),
            'remember_token' => Str::random(60),
        ]);
    }
}
