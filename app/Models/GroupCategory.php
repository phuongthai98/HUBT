<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupCategory extends Model
{
    use SoftDeletes;
    protected $table = 'category_group';

    protected $fillable = ['category_group_name','deleted_at','created_at','updated_at'];
    protected $hidden = [
    ];
    public $timestamp = true;
    protected $dates = ['deleted_at'];
}
