<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{

    public function insert_permissions(Request $request, $id){
        $data = $request->all();
        $role = Role::find($id);
        if ($role) {
            $selectedPermissions = $request->input('permission', []);
            $permissions = Permission::whereIn('id', $selectedPermissions)->get();
            $role->syncPermissions($permissions);
            toastr()->success('Thành Công', 'Phân quyền cho vai trò thành công');
            return redirect()->route('role.index');
        } else {
            abort(404);
        }
    }

    public function assign_permissions($id){
        $role = Role::find($id);

        if ($role) {
            $permissions = $role->permissions;
            $get_permissions = $role->getPermissionsViaRoles();
        } else {
            abort(404);
        }

        $list_permissions = Permission::orderBy('id', 'DESC')->get();

        return view('admincp.role.assign_permissions', compact('role', 'permissions', 'list_permissions','get_permissions'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_role = Role::orderBy('id', 'DESC')->get();
        return view('admincp.role.index', compact('list_role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.role.form_role');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $role = new Role();
        $role->name = $data['name'];
        $role->save();
        toastr()->success('Thành Công','Thêm vai trò thành công');
        return redirect()->route('role.index');
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
        $role = Role::find($id);
        return view('admincp.role.form', compact('role'));
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
        $data = $request->all();
        $role = Role::find($id);
        $role->name = $data['name'];
        $role->save();
        toastr()->success('Thành Công','cập nhật vai trò thành công');
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::find($id)->delete();
        toastr()->success('Thành Công','Xóa vai trò thành công');
        return redirect()->back();
    }
}