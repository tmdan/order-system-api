<?php

namespace App\Console\Commands;

use App\Http\Resources\ProductsResource;
use App\Product;
use Illuminate\Console\Command;

class GetAllProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all products from db';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $productsHeaders = ['Id', 'Name'];
        $products = Product::all(['id', 'name']);
        $this->table($productsHeaders, $products->toArray());
    }
}
