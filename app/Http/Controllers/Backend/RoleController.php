<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function AllPermission()
    {
        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission', compact('permissions'));
    } // End Method
    public function AddPermission()
    {
        $permissions = Permission::all();
        return view('backend.pages.permission.add_permission', compact('permissions'));
    } // End Method
}
