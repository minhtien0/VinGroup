<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function admin(Request $request) {
        $user=$request->session()->get('user');
        if(!$user){
            return redirect()->route('home.index')->with('erro','bạn cần đăng nhập');
        }
        if($user->name !=='Admin'){
            return redirect()->route('#')->with('erro','khong được phép');
        }
        return redirect()->route('lienhe.admin');
    }
}
