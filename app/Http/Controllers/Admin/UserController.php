<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;

class UserController extends Controller
{
    public function listUser()
    {
        $users = User::orderby('id','desc')->get();
        return view('User.list-user',['users'=>$users]);
    }
    
}