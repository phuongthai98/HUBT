<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Detail extends Controller
{
    public function index(Request $rq)
    {
        $id = $rq->id;
        $data = Product::find($id);
        View::create([
            'product_id' => $id,
            'view' => 1,
            'created_at' => Carbon::now()
        ]);
        //-----San pham trong thang hien tai
        $date = date("Y-m-d");
        $date2 = explode('-', $date);
        $month = $date2['1'];
        $data2 = DB::table('product')
            ->join('view', 'product.id', '=', 'view.product_id')
            ->whereMonth('view.created_at', $month)
            ->selectRaw("SUM(view.view) as view,product.image,
            product.id,
            product.product_name,
            product.product_price,
            product.sale_price,
            product.description")
            ->groupBy('product.id')
            ->groupBy('product.image')
            ->groupBy('product.product_name')
            ->groupBy('product.product_price')
            ->groupBy('product.sale_price')
            ->groupBy('product.description')
            ->orderBy('view', 'DESC')
            ->take(10)
            ->get();
        if ($data->group_category_id == 1) {
            $like_type = Product::query()
                ->where('deleted_at', null)
                ->where('status', 1)
                ->where('group_category_id', 1)
                ->inRandomOrder()->take(3)->get();
        }
        if ($data->group_category_id == 2) {
            $like_type = Product::query()
                ->where('deleted_at', null)
                ->where('status', 1)
                ->where('group_category_id', 2)
                ->inRandomOrder()->take(3)->get();
        }
        if ($data->group_category_id == 7) {
            $like_type = Product::query()
                ->where('deleted_at', null)
                ->where('status', 1)
                ->where('group_category_id', 7)
                ->inRandomOrder()->take(3)->get();
        }
        if ($data->group_category_id == 8) {
            $like_type = Product::query()
                ->where('deleted_at', null)
                ->where('status', 1)
                ->where('group_category_id', 8)
                ->inRandomOrder()->take(3)->get();
        }
        return view('home.Detail.index', compact('data', 'data2', 'like_type'));
    }
}
