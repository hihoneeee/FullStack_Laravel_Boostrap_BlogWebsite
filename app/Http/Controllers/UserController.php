<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Session;
use Carbon\Carbon;

class UserController extends Controller
{
    public function assign_role($id){
        $user = User::find($id);

        if ($user) {
            $roles = $user->roles;

            if ($roles->isNotEmpty()) {
                $name_roles = $roles->first()->name;
                $all_colum_roles = $roles->first();
            } else {
                $name_roles = null;
                $all_colum_roles = null;
            }
        } else {
            abort(404);
        }

        $list_role = Role::orderBy('id', 'DESC')->get();

        return view('admincp.user.assign_roles', compact('user', 'list_role', 'name_roles', 'all_colum_roles'));
    }

    public function insert_role($id, Request $request){
        $data = $request->all();
        $user = User::find($id);

        $user->syncRoles([$data['role']]);

        toastr()->success('Thành Công', 'Cấp vai trò thành công');
        return redirect()->route('user.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $role = Role::create(['name' => 'writer']);
        // $role = Role::create(['name' => 'admin']);

        // $permission = Permission::create(['name' => 'them danhmuc']);
        // $permission = Permission::create(['name' => 'sua danhmuc']);
        // $permission = Permission::create(['name' => 'xoa danhmuc']);
        // $permission = Permission::create(['name' => 'them baiviet']);
        // $permission = Permission::create(['name' => 'sua baiviet']);
        // $permission = Permission::create(['name' => 'xoa baiviet']);

        // $role = Role::find(3);
        // $permission = Permission::find(3);
        // $role->givePermissionTo($permission);

        // auth()->user()->assignRole('admin');

        $list = User::with('roles','permissions')->orderby('id','DESC')->get();
        return view('admincp.user.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'email' => 'required|unique:users|max:255',
                'name' => 'required|max:255',
                'password' => 'required|min:8|confirmed',
                'description' => 'required',
                'image' => 'required',
            ],
            [
                'name.required' => 'Tên không được để trống',
                'email.unique' => 'Email đã tồn tại, xin điền email khác',
                'email.required' => 'Email không được để trống',
                'description.required' => 'Mô Tả không được để trống',
                'image.required' => 'Hình ảnh không được để trống',
            ]
        );
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($request->input('password'));
        $user->description = $data['description'];
        $user->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $user->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        $get_image = $request->file('image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image -> move('uploads/user/', $new_image);
            $user->image = $new_image;
        }

        $user->save();
        toastr()->success('Thành Công','Thêm tài khoản thành công');
        return redirect()->route('user.index');
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
        $user = User::find($id);
        return view('admincp.user.form_update', compact('user'));
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
        $data = $request->validate(
            [
                'name' => 'required|max:255',
                'description' => 'required',
                'image' => 'required',
            ],
            [
                'name.required' => 'Tên không được để trống',
                'description.required' => 'Mô Tả không được để trống',
                'image.required' => 'Hình ảnh không được để trống',
            ]
        );
        $user = User::find($id);
        $user->name = $data['name'];
        $user->description = $data['description'];
        $user->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        $get_image = $request->file('image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image -> move('uploads/user/', $new_image);
            $user->image = $new_image;
        }

        $user->save();
        toastr()->success('Thành Công','Cập nhật tài khoản thành công');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(file_exists('uploads/user/'.$user->image)){
            unlink('uploads/user/'.$user->image);
        }
        $user->delete();
        toastr()->success('Thành Công','Xóa tài khoản thành công');
        return redirect()->back();
    }
}