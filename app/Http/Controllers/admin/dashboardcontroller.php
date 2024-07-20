<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class dashboardcontroller extends Controller
{
    public function users() {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }
    public function viewuser($id) {
        $users = User::find($id);
        return view('admin.users.view',compact('users'));
    }
}

