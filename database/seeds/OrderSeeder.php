<?php

use App\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{

    public function run()
    {
        \App\Order::firstOrCreate([
            'status'=>'выполнен',
            'user_id'=>1
        ])->products()->sync([1,2]);

    }
}
