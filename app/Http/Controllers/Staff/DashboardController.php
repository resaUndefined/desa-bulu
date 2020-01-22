<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Post;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
    	// $artikels = Post::where('kategori_id')
    	return view('staff.index');
    }
}
