<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
// use App\Model\Pertemuan;
// use App\Model\Kas;
// use App\Model\Iuran;
// use App\Model\Kasflow;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
    	
    	return view('admin.index');
    }
}
