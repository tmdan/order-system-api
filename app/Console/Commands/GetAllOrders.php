<?php

namespace App\Console\Commands;

use App\Order;
use Illuminate\Console\Command;

class GetAllOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all orders from db';

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
        $orders=Order::with('products','user')->get();
        $orderHeaders = ['Id', 'status', 'user_id'];
        $orders = Order::all(['id', 'status', 'user_id'])->toArray();
        $this->table($orderHeaders, $orders);
    }
}
