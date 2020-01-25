<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Post;
use App\Model\Desa;
use App\Model\Masyarakat;
use App\Model\Rt;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
    	$artikel = Post::where('kategori_id',1)->count();
    	$destinasi = Post::where('kategori_id',2)->count();
    	$event = Post::where('kategori_id',3)->count();
    	$desa = Desa::first();
    	if (is_null($desa)) {
    		$desa = 'Data Desa Belum Ditambahkan';
    	}
    	$rt = Rt::all();
    	$jmlRT = 0;
    	if (count($rt) > 0) {
    		$jmlRT = count($rt);
    	}
    	$masyarakat = Masyarakat::all();
    	$laki = 0;
    	$perempuan = 0;
    	if (count($masyarakat) > 0) {
	    	foreach ($masyarakat as $key => $value) {
	    		$laki+=$value->laki;
	    		$perempuan+=$value->perempuan;	
	    	}
    	}
    	return view('staff.index', [
    		'artikel' => $artikel,
    		'destinasi' => $destinasi,
    		'event' => $event,
    		'event' => $event,
    		'desa' => $desa,
    		'rt' => $rt,
    		'jmlRT' => $jmlRT,
    		'laki' => $laki,
    		'perempuan' => $perempuan,
    	]);
    }
}
