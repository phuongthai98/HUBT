<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Chart extends Controller
{
    //----- Chart JS
    public function chart1()
    {
//-----San pham trong thang hien tai
        $date = date("Y-m-d");
        $date2 = explode('-', $date);
        $month = $date2['1'];
// //------Top 10 sp ban chay nhat
        $order1 = OrderProduct::whereMonth('created_at', $month)->where('group_category_id', 1)->get();
        // tong so luong may tinh ban ra trong thang
        $sum = $order1->sum('quantity');
        // ------
        $order = DB::table('product')
            ->join('order_product', 'product.id', '=', 'order_product.product_id')
            ->join('order', 'order.id', '=', 'order_product.order_id')
            ->whereMonth('order.created_at', $month)
            ->where('product.group_category_id', 1)
            ->selectRaw("SUM(order_product.quantity) as quantity, product.product_name")
            ->groupBy('product_name')
            ->orderBy('quantity', 'DESC')
            ->take(10)
            ->get();
        return view('admin.Chart.chart1', compact('order', 'sum'));
    }
//------------------------Chart-pk
    public function chart2()
    {
//-----San pham trong thang hien tai
        $date = date("Y-m-d");
        $date2 = explode('-', $date);
        $month = $date2['1'];
// //------Top 10 pk ban chay nhat
        $order1 = OrderProduct::whereMonth('created_at', $month)->where('group_category_id', 2)->get();
        // tong so luong phu kien ban ra trong thang
        $sum = $order1->sum('quantity');
        // ------
        $order = DB::table('product')
            ->join('order_product', 'product.id', '=', 'order_product.product_id')
            ->join('order', 'order.id', '=', 'order_product.order_id')
            ->whereMonth('order.created_at', $month)
            ->where('product.group_category_id', 2)
            ->selectRaw("SUM(order_product.quantity) as quantity, product.product_name")
            ->groupBy('product_name')
            ->orderBy('quantity', 'DESC')
            ->take(10)
            ->get();
        return view('admin.Chart.Chart2', compact('order', 'sum'));
    }
//
////----- Chart JS 20 MAy tinh
    public function chart3()
    {
//-----San pham trong thang hien tai
        $date = date("Y-m-d");
        $date2 = explode('-', $date);
        $month = $date2['1'];
        $watch = View::whereMonth('created_at', $month)->get();
        $sum_view = $watch->sum('view');
        $view = DB::table('product')
            ->join('view', 'product.id', '=', 'view.product_id')
            ->whereMonth('view.created_at', $month)
            ->where('product.group_category_id', 1)
            ->selectRaw("SUM(view.view) as view, product.product_name")
            ->groupBy('product_name')
            ->orderBy('view', 'DESC')
            ->take(20)
            ->get();
        return view('admin.Chart.Chart3', compact('sum_view', 'view'));
    }

// ------------------20sp pk
    public function chart4()
    {
//-----San pham trong thang hien tai
        $date = date("Y-m-d");
        $date2 = explode('-', $date);
        $month = $date2['1'];
        $watch = View::whereMonth('created_at', $month)->get();
        $sum_view = $watch->sum('view');
        $view = DB::table('product')
            ->join('view', 'product.id', '=', 'view.product_id')
            ->whereMonth('view.created_at', $month)
            ->where('product.group_category_id', 2)
            ->selectRaw("SUM(view.view) as view, product.product_name")
            ->groupBy('product_name')
            ->orderBy('view', 'DESC')
            ->take(20)
            ->get();
        return view('admin.Chart.Chart4', compact('sum_view', 'view'));
    }
//----------------- Bieu do ket hop
    public function chart()
    {
        $date = date("Y-m-d");
        $date2 = explode('-', $date);
        $month = $date2['1'];
        $chart_sum = DB::table('product')
            ->join('view', 'product.id', '=', 'view.product_id')
            ->join('order_product', 'product.id', '=', 'order_product.product_id')
            ->whereMonth('view.created_at', $month)
            ->selectRaw("SUM(view.view) as view, SUM(order_product.quantity) as quantity, product.product_name")
            ->groupBy('product_name')
            ->orderBy('quantity', 'DESC')
            ->take(10)
            ->get();
        return view('admin.Chart.Chart', compact('chart_sum'));
    }
}
