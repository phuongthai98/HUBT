<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = ['name','email','address','phone','deleted_at','created_at','updated_at'];

    public $timestamp = true;
}
