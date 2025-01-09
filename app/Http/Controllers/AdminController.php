<?php

namespace App\Http\Controllers;;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function orders()
    {
        $orders = DB::table('donhang')->get();
        return view('admin.donhang.orders',compact('orders'));
    }
    public function editorders()
    {
        return view('admin.donhang.editorders');
    }
}
