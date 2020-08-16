<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_product';

    protected $fillable = ['product_id','order_id','product_name','quantity','group_category_id','deleted_at','created_at','updated_at'];

    public $timestamps = false;
}
