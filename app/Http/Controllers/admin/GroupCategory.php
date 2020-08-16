<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupCategory extends Controller
{
    public function __construct(){
        $this->middleware('permission:admin',['only' => ['index','show','edit','destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gr = DB::table('category_group')
            ->where('deleted_at',NULL)
            ->orderBy('id','ASC')
            ->paginate(10);
        return view('admin.GroupCategory.index',compact('gr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.GroupCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new \App\Models\GroupCategory();
        $data->category_group_name = $request->gr_cat_name;
        $data->status = $request->status;
        $data->created_at = Carbon::now();
        $data->updated_at = Carbon::now();
        if ($data->save()) {
            return redirect()->action('admin\GroupCategory@index',[])->withSuccess('Đã thêm thành công nhóm danh mục ' . "'" . "$request->gr_cat_name" . "' !");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Models\GroupCategory::find($id)->delete();
        return redirect()->action('admin\GroupCategory@index',[])->withSuccess('Xóa thành công!');
    }
}
