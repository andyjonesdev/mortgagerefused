<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\User;

class PermissionsController extends Controller
{
    public function addRole(Request $req) {
        $role = Role::create(['name' => $req->name]);
        //$permission = Permission::create(['name' => 'edit articles']);
        return redirect('/permissions');
    }

    public function addPermission(Request $req) {
        $permission = Permission::create(['name' => $req->name]);
        return redirect('/permissions');
    }

    public function list() {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('/cms/permissions',['roles'=>$roles,'permissions'=>$permissions]);
    }

    public function list_admin() {
        $admin_users = User::role('admin')->get();
        $super_admin_users = User::role('super admin')->get();
        return view('/cms/admin-users',['admin_users'=>$admin_users, 'super_admin_users'=>$super_admin_users]);
    }

    public function deletePermission($role_id,$permission_id) {
        $role = Role::where('id',$role_id)->first();
        $permission = Permission::where('id',$permission_id)->first();
        $role->revokePermissionTo($permission->name);
        return redirect('/permissions');
    }

    public function dashboard() {
        $user = auth()->user();
        $is_super_admin = $user->hasRole('super admin');
        $is_admin = $user->hasRole('admin');
        $is_broker = $user->hasRole('broker');
        $role = '';
        if ($is_super_admin)
            $role = Role::where('name','super admin')->first();
        else if ($is_admin)
            $role = Role::where('name','admin')->first();
        else if ($is_broker)
            $role = Role::where('name','broker')->first();

        if ($role) {
            $role_permisssions = $role->permissions;
            return view('dashboard',['role_permisssions'=>$role_permisssions, 'is_super_admin'=>$is_super_admin, 'is_admin'=>$is_admin, 'is_broker'=>$is_broker]);
        }
    }
}
