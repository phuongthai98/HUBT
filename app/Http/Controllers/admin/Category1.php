<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Category1 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('category')
            ->where('deleted_at',NULL)
            ->where('group_category',1)
            ->orderBy('updated_at','DESC')
            ->paginate(15);
        return view('admin.Category.Category1.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Category.Category1.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Category();
        $data->category_name = $request->cat_name;
        $data->group_category = $request->group;
        $data->status = $request->status;
        $data->created_at = Carbon::now();
        $data->updated_at = Carbon::now();
        if ($data->save()) {
            return redirect()->action('admin\Category1@index',[])->withSuccess('Đã thêm thành công danh mục ' . "'" . "$request->cat_name" . "' !");
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
        $data = Category::query()->find($id);
        return view('admin.Category.Category1.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Category::find($id);
        $data->category_name = $request->cat_name;
        $data->group_category = $request->group;
        $data->status = $request->status;
        $data->updated_at = Carbon::now();
        if ($data->save()) {
            return redirect()->action('admin\Category1@index',[])->withSuccess('Cập nhật thành công!');
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
        Category::query()->find($id)->delete();
        return redirect()->action('admin\Category1@index')->withSuccess('Xóa thành công!');
    }
}
