<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $table = 'view';

    protected $fillable = ['product_id','view','created_at'];

    public $timestamps = false;
}
