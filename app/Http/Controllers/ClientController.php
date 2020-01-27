<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Kategori;
use App\Model\Post;
use App\Model\Galeri;
use App\Model\Batasdesa;
use App\Model\Rt;
use App\Model\Masyarakat;
use App\Model\Desa;
use App\Model\Karangtaruna;
use App\Model\Detailkarang;
use App\Model\Fasilitas;
use App\Model\Kegiatan;
use DB;
use Illuminate\Support\Str;
use Validator;


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


    public function search(Request $request)
    {
    	$validator = Validator::make($request->all(), [
                        'keyword' => 'required|string',
                        'kategori' => 'required|exists:kategori,id',
                    ],
                    [
                        'keyword.required' => 'keyword harus diisi',
                        'keyword.string' => 'format penulisan keyword tidak sesuai',
                        'kategori.required' => 'kategori belum dipilih',
                        'kategori.exists' => 'kategori tidak ditemukan',
                    ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
        	$resultSearch = Post::where('kategori_id', $request->kategori)
        							->where('judul', 'like', '%'.$request->keyword.'%')
        							->get();
	        $nama = null;
	        if ($request->kategori == 1) {
	        	$nama = 'Artikel';
	        } elseif ($request->kategori == 2) {
	        	$nama = 'Destinasi';
	        } else {
	        	$nama = 'Event';
	        }
        
        	return view('client.hasil', [
        		'resultSearch' => $resultSearch,
        		'nama' => $nama,
        	]);
        }
    }


    public function dusun()
    {
    	$fasilitas = Fasilitas::all();
    	$kegiatan = Kegiatan::all();
    	$rt = Rt::count();
    	$rtAwal = Rt::first();
    	$rtAkhir = Rt::orderBy('id', 'DESC')->first();
    	$batasDesa = Batasdesa::all();
    	$dusun = Desa::first();

    	return view('client.dusun', [
    		'dusun' => $dusun,
    		'fasilitas' => $fasilitas,
    		'kegiatan' => $kegiatan,
    		'rt' => $rt,
    		'rtAkhir' => $rtAkhir,
    		'rtAwal' => $rtAwal,
    		'batasDesa' => $batasDesa,
    	]);
    }


    public function data_dusun()
    {
    	$dusun = Desa::first();
    	$masyarakat = Masyarakat::all();
    	$rt = Rt::all();
    	$jumKK = Rt::sum('jml_kk');
    	$jumLaki = (int)Masyarakat::sum('laki');
    	$jumPerempuan = (int)Masyarakat::sum('perempuan');
    	$total = $jumLaki + $jumPerempuan;

    	return view('client.data_dusun', [
    		'dusun' => $dusun,
    		'masyarakat' => $masyarakat,
    		'rt' => $rt,
    		'jumKK' => $jumKK,
    		'jumLaki' => $jumLaki,
    		'jumPerempuan' => $jumPerempuan,
    		'total' => $total,
    	]);
    }


    public function organisasi()
    {
    	$dusun = Desa::first();
    	$rt = Rt::all();
    	$karangTaruna = Karangtaruna::all();
    	$kartaBule = Detailkarang::where('karangtaruna_id',1)->get();
    	$bukid = Detailkarang::where('karangtaruna_id',2)->get();
    	$rembulan = Detailkarang::where('karangtaruna_id',3)->get();

    	return view('client.organisasi', [
    		'dusun' => $dusun,
    		'rt' => $rt,
    		'karangTaruna' => $karangTaruna,
    		'kartaBule' => $kartaBule,
    		'bukid' => $bukid,
    		'rembulan' => $rembulan,
    	]);
    }


    public function kampung_kb()
    {
    	$dusun = Desa::first();

    	return view('client.kampung-kb', [
    		'dusun' => $dusun,
    	]);
    }
}
