<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{

    public function up()
    {
        try {
            Schema::create('orders', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->enum('status', ['создан', 'обработан', 'передан курьеру', 'выполнен', 'отменен']);
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate("cascade");
                $table->timestamps();
            });
        } catch (Exception $e) {
            $this->down();
            throw  new Exception($e->getMessage());
        }
    }


    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
