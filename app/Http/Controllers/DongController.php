<?php
namespace App\Http\Controllers;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class DongController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
}