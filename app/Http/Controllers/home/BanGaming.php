<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BanGaming extends Controller
{
    public function index(){
        $data = DB::table('product')
            ->where('deleted_at',null)
            ->where('status',1)
            ->where('group_category_id',8)
            ->paginate(9);
        return view('home.BanGaming.index',compact('data'));
    }
}
