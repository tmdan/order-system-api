<?php

namespace App\Console\Commands;

use App\Http\Resources\OrdersResource;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Console\Command;

class CreateOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:orders-create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save new order to db';

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
        $productsIds = [];


        $usersHeaders = ['Id', 'Name', 'Email'];
        $users = User::all(['id', 'name', 'email']);
        $this->table($usersHeaders, $users->toArray());
        choose_user:
        $userId = $this->ask('What is user Id?');

        if (User::find($userId) === null) {
            $this->error('User is not exist!');
            goto choose_user;
        }


        $productsHeaders = ['Id', 'Name'];
        $products = Product::all(['id', 'name']);
        $this->table($productsHeaders, $products->toArray());
        choose_product:
        $productId = $this->ask('What is product Id?');

        if (Product::find($productId) === null) {
            $this->error('Product is not exist!');
            goto choose_product;
        } else {
            $productsIds[] = $productId;
            if ($this->confirm('One more product?')) {
                goto  choose_product;
            }
        }


        $order = Order::UpdateOrCreate([
            'user_id' => $userId,
        ], [
            'status' => 'создан'
        ]);

        $order->products()->sync($productsIds);

        $this->info("Order successfully added.");

    }
}
