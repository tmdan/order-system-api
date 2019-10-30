<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    const STATUS = ['создан', 'обработан', 'передан курьеру', 'выполнен', 'отменен'];


    protected $fillable = [
        'user_id',
        'status',
    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'order_product','order_id', 'product_id');
    }
}
