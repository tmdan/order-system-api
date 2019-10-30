<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    public function run()
    {
        \App\Product::firstOrCreate([
            'name'=>"Товар 1"
        ]);

        \App\Product::firstOrCreate([
            'name'=>"Товар 2"
        ]);
    }
}
