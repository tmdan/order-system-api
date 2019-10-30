<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{


    public function up()
    {
        try {
            Schema::create('order_product', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('order_id');
                $table->unsignedBigInteger('product_id');
                $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate("cascade");
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate("cascade");
            });
        } catch (Exception $e) {
            $this->down();
            throw  new Exception($e->getMessage());
        }
    }


    public function down()
    {
        Schema::dropIfExists('order_product');
    }
}
