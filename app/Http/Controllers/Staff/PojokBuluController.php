<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Model\Post;
use DB;
use Auth;


class PojokBuluController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pojokBulu = DB::table('post')
                    ->join('users','post.author', '=', 'users.id')
                    ->where('post.kategori_id', '=', 4)
                    ->select('post.id', 'users.name as author', 'post.judul')
                    ->orderBy('post.id', 'DESC')
                    ->paginate(5);

        return view('staff.pojok-bulu.index', [
            'pojokBulu' => $pojokBulu,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.pojok-bulu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                        'gambar' => 'required|image|mimes:jpeg,png,jpg|max:1024',
                        'judul' => 'required|string',
                        'isi' => 'required',
                    ],
                    [
                        'gambar.required' => 'Gambar belum dipilih',
                        'gambar.image' => 'File harus berupa gambar',
                        'gambar.mimes' => 'Format file hanya boleh ber ekstensi .jpg/.jpeg/.png',
                        'gambar.max' => 'Ukuran file maksimal 1 mb',
                        'judul.required' => 'Judul wajib diisi',
                        'judul.string' => 'format penulisan Judul tidak sesuai',
                        'isi.required' => 'Isi wajib diisi',
                    ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $pojokBulu = new Post();
            $file = $request->file('gambar');
            $nama_file = time()."_".$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $nama_file);
            $pojokBulu->gambar = $nama_file;
            $pojokBulu->judul = $request->judul;
            $pojokBulu->isi = $request->isi;
            $pojokBulu->kategori_id = 4;
            $pojokBulu->author = Auth::id();
            $pojokBuluSave = $pojokBulu->save();
            if ($pojokBuluSave) {
                $pesan = $request->judul.' berhasil ditambahkan';
                return redirect()->route('pojok-bulu.index')->with('sukses', $pesan);
            }
            $pesan = $request->judul.' gagal ditambahkan';
            return redirect()->route('pojok-bulu.index')->with('gagal', $pesan);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
