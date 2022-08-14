<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;

class UserController extends Controller
{
    public function listUser(Request $request)
    {
        $titlePage = 'Admin | Management User';
        $users = User::when($request->keyword, function ($query, $keyword) {
                        
                return $query->where('email','LIKE',"%".$keyword."%")
                            ->orWhere('phone','LIKE',"%".$keyword."%"); 
                        
            })->orderby('updated_at','desc')->paginate(20);
        return view('User.list-user',['users'=>$users]);
    }
    
}
