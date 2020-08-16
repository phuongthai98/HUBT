<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'product';

    protected $fillable = ['product_name', 'group_category_id', 'image', 'product_price', 'sale_price', 'description', 'content', 'category_id', 'status', 'deleted_at', 'created_at', 'updated_at'];

    public $timestamp = true;
    protected $dates = ['deleted_at'];
}
