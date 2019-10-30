<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{

    public function up()
    {
        try {
            Schema::create('products', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');

                $table->timestamps();
            });
        } catch (Exception $e) {
            $this->down();
            throw  new Exception($e->getMessage());
        }
    }


    public function down()
    {
        Schema::dropIfExists('products');
    }
}
