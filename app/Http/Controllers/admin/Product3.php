<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\RequestEditProduct;
use App\Http\Requests\Admin\Product\RequestProduct;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Product3 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('product')
            ->where('deleted_at',NULL)
            ->where('group_category_id',7)
            ->orderBy('updated_at','DESC')
            ->paginate(10);
        return view('admin.Product.Product3.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Product.Product3.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestProduct $request)
    {
        $file = $request->file('image');
        $image = time() . '-' . $file->getClientOriginalName('image');
        $data = new Product();
        $data->product_name = $request->pro_name;
        $data->product_price = $request->price;
        $data->sale_price = $request->sale_price;
        $data->category_id = $request->group2;
        $data->status = $request->status;
        $data->group_category_id = $request->group1;
        $data->description = $request->description;
        $data->content = $request->content;
        $data->image = $image;
        $data->created_at = Carbon::now();
        $data->updated_at = Carbon::now();
        if ($data->save()) {
            $file->move('upload/product', $image);
            return redirect()->action('admin\Product3@index',[])->withSuccess('Đã thêm thành công sản phẩm ' . "'" . "$request->pro_name" . "' !");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::find($id);
        return view('admin.Product.Product3.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestEditProduct $request, $id)
    {
        $data = Product::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = time() . '-' . $file->getClientOriginalName('image');
            $data->product_name = $request->pro_name;
            $data->product_price = $request->price;
            $data->sale_price = $request->sale_price;
            $data->category_id = $request->group2;
            $data->status = $request->status;
            $data->group_category_id = $request->group1;
            $data->description = $request->description;
            $data->content = $request->content;
            $data->image = $image;
            $data->updated_at = Carbon::now();
            if ($data->save()) {
                $file->move('upload/product', $image);
                return redirect()->action('admin\Product3@index', [])->withSuccess('Cập nhật thành công!');
            }
        } else {
            $data->product_name = $request->pro_name;
            $data->product_price = $request->price;
            $data->sale_price = $request->sale_price;
            $data->category_id = $request->group2;
            $data->status = $request->status;
            $data->group_category_id = $request->group1;
            $data->description = $request->description;
            $data->content = $request->content;
            $data->updated_at = Carbon::now();
            if ($data->save()) {
                return redirect()->action('admin\Product3@index', [])->withSuccess('Cập nhật thành công!');
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->action('admin\Product3@index',[])->withSuccess('Xóa thành công!');
    }
}
