<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\RequestFormUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class User extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Models\User::query()
            ->orderBy('updated_at', 'DESC')
            ->paginate(20);
        return view('admin.User.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::query()->get();
        return view('admin.User.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestFormUser $request)
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
            $data->status = $request->status;
            $data->avatar = $image;
            $data->created_at = Carbon::now();
            $data->updated_at = Carbon::now();
            if ($data->save()) {
                $data->assignRole([$request->role]);
                $file->move('upload/avatar', $image);
                return redirect()->action('admin\User@index', [])->withSuccess('Thêm mới thành công!');
            }
        } else {
            $data = new \App\Models\User();
            $data->name = $request->name;
            $data->full_name = $request->full_name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->status = $request->status;
            $data->created_at = Carbon::now();
            $data->updated_at = Carbon::now();
            if ($data->save()) {
                $data->assignRole($request->role);
                return redirect()->action('admin\User@index', [])->withSuccess('Thêm mới thành công!');
            }
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
        $data = \App\Models\User::find($id);
        return view('admin\User.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = \App\Models\User::find($id);
        $role = Role::all();
        $data_role = $data->getRoleNames();
        return view('admin.User.edit',compact('data','role','data_role'));
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
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = time() . '-' . $file->getClientOriginalName('image');
            $data = \App\Models\User::find($id);
            $data->name = $request->name;
            $data->full_name = $request->full_name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->password = bcrypt($request->password);
            $data->address = $request->address;
            $data->status = $request->status;
            $data->avatar = $image;
            $data->updated_at = Carbon::now();
            if ($data->save()) {
                $data->assignRole([$request->role]);
                $file->move('upload/avatar', $image);
                return redirect()->action('admin\User@index', [])->withSuccess('Thêm mới thành công!');
            }
        } else {
            $data = \App\Models\User::find($id);
            $data->name = $request->name;
            $data->full_name = $request->full_name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->status = $request->status;
            $data->updated_at = Carbon::now();
            if ($data->save()) {
                $data->assignRole($request->role);
                return redirect()->action('admin\User@index', [])->withSuccess('Thêm mới thành công!');
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
        \App\Models\User::find($id)->delete();

        return redirect()->action('admin\User@index',[])->withSuccess('Xóa thành công!');
    }
}
