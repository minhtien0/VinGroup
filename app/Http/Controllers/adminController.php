<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
{
    // Tập hợp dữ liệu và trả về view
    return view('admin.dashboard',);
}
    public function indexsp(){
        return view('admin.sanpham.indexsp');
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
