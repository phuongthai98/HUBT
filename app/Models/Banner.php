<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';

    protected $fillable = ['banner_name','image','link','status','deleted_at','created_at','updated_at'];

    public $timestamp = true;
}
