<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\RequestBanner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Banner extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('banner')
            ->where('deleted_at', NULL)
            ->orderBy('updated_at', 'DESC')
            ->paginate(5);
        return view('admin.Banner.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestBanner $request)
    {
        $file = $request->file('image');
        $image = time() . '-' . $file->getClientOriginalName('image');
        $data = new \App\Models\Banner();
        $data->banner_name = $request->name;
        $data->link = $request->link;
        $data->status = $request->status;
        $data->image = $image;
        $data->created_at = Carbon::now();
        $data->updated_at = Carbon::now();
        if ($data->save()) {
            $file->move('upload/banner', $image);
            return redirect()->action('admin\Banner@index', [])->withSuccess('Thêm thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = \App\Models\Banner::find($id);
        return view('admin.Banner.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = \App\Models\Banner::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = time() . '-' . $file->getClientOriginalName('image');
            $data->banner_name = $request->name;
            $data->link = $request->link;
            $data->status = $request->status;
            $data->image = $image;
            if ($data->save()) {
                $file->move('upload/banner', $image);
                return redirect()->action('admin\Banner@index',[])->withSuccess('Cập nhật thành công!');
            }
        } else {
            $data->banner_name = $request->name;
            $data->link = $request->link;
            $data->status = $request->status;
            if ($data->save()) {
                return redirect()->action('admin\Banner@index',[])->withSuccess('Cập nhật thành công!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Models\Banner::find($id)->delete();
        return redirect()->action('admin\Banner@index',[])->withSuccess('Xóa thành công!');
    }
}
