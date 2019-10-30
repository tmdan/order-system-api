<?php

namespace App\Console\Commands;

use App\Order;
use App\Product;
use Illuminate\Console\Command;

class UpdateOrderStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:orders-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update a order status';

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
        $orderHeaders = ['Id', 'status', 'user_id'];

        $orders = Order::all(['id', 'status', 'user_id']);

        $this->table($orderHeaders, $orders->toArray());

        choose_order:
        $orderId = $this->ask('What is order Id?');

        $order = Order::find($orderId);

        if ($order === null) {
            $this->error('Order is not exist!');
            goto choose_order;
        }

        $orderStatus = $this->choice('What is order status?', Order::STATUS);

        dd($order->update(['status', $orderStatus]));

        $this->info("Order's status successfully update.");

    }
}
