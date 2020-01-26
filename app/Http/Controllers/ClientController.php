<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Kategori;
use App\Model\Post;
use App\Model\Galeri;
use DB;
use Illuminate\Support\Str;


class ClientController extends Controller
{
    public function index()
    {
    	$slider = Post::where('is_slider',1)->get();
    	$destinasi = Post::where([
    		'is_slider' => 0,
    		'kategori_id' => 2,
    	])->orderBy('id', 'DESC')
    	->take(3)
    	->get();
    	$event = Post::where([
    		'is_slider' => 0,
    		'kategori_id' => 3
    	])->orderBy('id', 'DESC')
    	->take(3)
    	->get();
    	$galeri = Galeri::all();
    	$artikelNew = Post::where([
    		'is_slider' => 0,
    		'kategori_id' => 1
    	])
    	->orderBy('id', 'DESC')->first();
    	$artikel = Post::where([
    		'is_slider' => 0,
    		'kategori_id' => 1 
    	])
    	->where('id', '!=', $artikelNew->id)
    	->orderBy('id', 'DESC')
    	->take(3)
    	->get();

    	$galeri = Galeri::all();
    	return view('client.index', [
    		'slider' => $slider,
    		'destinasi' => $destinasi,
    		'event' => $event,
    		'galeri' => $galeri,
    		'artikel' => $artikel,
    		'artikelNew' => $artikelNew,
    	]);
    }


    public function event()
    {
    	$event = Post::where('kategori_id',3)
    					->orderBy('id', 'DESC')
    					->paginate(9);

    	return view('client.event', [
    		'event' => $event,
    	]);
    }


    public function artikel()
    {
    	$artikel = Post::where('kategori_id',1)
    					->orderBy('id', 'DESC')
    					->paginate(9);

    	return view('client.artikel', [
    		'artikel' => $artikel,
    	]);
    }


    public function destinasi()
    {
    	$destinasi = Post::where('kategori_id',2)
    					->orderBy('id', 'DESC')
    					->paginate(9);

    	return view('client.destinasi', [
    		'destinasi' => $destinasi,
    	]);
    }


    public function galeri()
    {
    	$galeri = Galeri::orderBy('id', 'DESC')->paginate(9);

    	return view('client.galeri', [
    		'galeri' => $galeri,
    	]);
    }


    public function detail($id)
    {
    	$data = DB::table('post')
    			->join('kategori', 'post.kategori_id', '=', 'kategori.id')
    					->join('users', 'post.author', '=', 'users.id')
    					->where('post.id', $id)
    					->select(
    						'post.id', 'post.judul', 'post.created_at as tgl',
    						'kategori.nama_kategori as kategori', 'post.isi', 
    						'users.name as author', 'post.gambar',
    						'post.kategori_id'
    					)
    					->first();
    	$relatedData = DB::table('post')
    					->join('kategori', 'post.kategori_id', '=', 'kategori.id')
    					->join('users', 'post.author', '=', 'users.id')
    					->where('post.kategori_id', $data->kategori_id)
    					->where('post.id', '!=', $data->id)
    					->select(
    						'post.id', 'post.judul', 'post.created_at as tgl', 
    						'users.name as author', 'post.gambar'
    					)
    					->orderBy('post.id', 'DESC')
    					->take(3)
    					->get();
    	$rute = null;
    	if ($data->kategori_id == 1) {
    		$rute = '/artikel';
    	} elseif ($data->kategori_id == 2) {
    		$rute = '/destinasi';
    	}else{
    		$rute = '/event';
    	}
    	
    	return view('client.detail', [
    		'data' => $data,
    		'relatedData' => $relatedData,
    		'rute' => $rute,
    	]);
    }
}
