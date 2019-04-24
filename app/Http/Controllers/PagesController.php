<?php

namespace Visionarium\Http\Controllers;

use Illuminate\Http\Request;
use Visionarium\Permission;

class PagesController extends Controller
{
    public function index()
    {
        if (auth()->user()) {
            $permissions = Permission::get();
            $userPermissions = array();

            foreach ($permissions as $key => $permission) {
                $userPermissions[$permission->name] = auth()->user()->can($permission->slug) ? 'true' : 'false';
            }

            return view('welcome')->with('permissions', $userPermissions);
        }

        return view('welcome');
    }
}
