<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = ['category_name', 'group_category', 'status', 'deleted_at', 'created_at', 'updated_at'];
    protected $hidden = [
    ];
    public $timestamp = true;
}
