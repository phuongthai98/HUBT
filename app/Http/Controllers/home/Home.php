<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\RequestFormUser;
use App\Http\Requests\Home\RequestHomeLogin;
use App\Models\Banner;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Home extends Controller
{
    public function index()
    {
        $product1 = Product::query()
            ->where('deleted_at', null)
            ->where('status', 1)
            ->where('group_category_id', 1)
            ->inRandomOrder()
            ->limit(3)
            ->get();
        $product2 = Product::query()
            ->where('deleted_at', null)
            ->where('status', 1)
            ->where('group_category_id', 2)
            ->inRandomOrder()
            ->limit(3)
            ->get();
        $banner = Banner::query()
            ->where('deleted_at', null)
            ->where('status', 1)
            ->inRandomOrder()
            ->limit(3)
            ->get();
//-----San pham trong thang hien tai
        $date = date("Y-m-d");
        $date2 = explode('-', $date);
        $month = $date2['1'];
        $data = DB::table('product')
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
        $top1 = DB::table('product')
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
            ->take(1)
            ->get();
        return view('home.Home.index', compact(
            'product1',
            'product2',
            'banner',
            'data',
            'top1'));
    }

    function getSearchAjax(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = Product::where('product_name', 'LIKE', "%{$query}%")->take(10)
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($data as $row) {
                $output .= '<li class="search_li"><a href="detail/' . $row->id . '">' . $row->product_name . '</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function login(RequestHomeLogin $request)
    {
        if (Auth::guard('home')->attempt($request->only('email', 'password'), false)) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('error', 'Mật khẩu không đúng!');
        }
    }

    public function logout()
    {
        Auth::guard('home')->logout();
        return redirect()->route('home');
    }

    public function sign_up()
    {
        return view('home.Account.SignUp');
    }

    public function sign_up_post(RequestFormUser $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = time() . '-' . $file->getClientOriginalName('image');
            $data = new \App\Models\User();
            $data->name = $request->name;
            $data->full_name = $request->full_name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->avatar = $image;
            $data->created_at = Carbon::now();
            $data->updated_at = Carbon::now();
            if ($data->save()) {
                $data->assignRole([$request->role]);
                $file->move('upload/avatar', $image);
                return redirect()->back()->withSuccess('Thêm mới thành công!');
            }
        } else {
            $data = new \App\Models\User();
            $data->name = $request->name;
            $data->full_name = $request->full_name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->created_at = Carbon::now();
            $data->updated_at = Carbon::now();
            if ($data->save()) {
                $data->assignRole($request->role);
                return redirect()->back()->withSuccess('Thêm mới thành công!');
            }
        }
    }
}
