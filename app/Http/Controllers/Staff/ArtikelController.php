<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Model\Post;
use DB;
use Auth;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = DB::table('post')
                    ->join('users','post.author', '=', 'users.id')
                    ->where('post.kategori_id', '=', 1)
                    ->select('post.id', 'users.name as author', 'post.judul')
                    ->orderBy('post.id', 'DESC')
                    ->paginate(5);

        return view('staff.artikel.index', [
            'artikel' => $artikel,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.artikel.create');
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
            $artikel = new Post();
            $file = $request->file('gambar');
            $nama_file = time()."_".$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $nama_file);
            $artikel->gambar = $nama_file;
            $artikel->judul = $request->judul;
            $artikel->isi = $request->isi;
            $artikel->kategori_id = 1;
            $artikel->author = Auth::id();
            $artikelSave = $artikel->save();
            if ($artikelSave) {
                $pesan = 'Artikel '.$request->judul.' berhasil ditambahkan';
                return redirect()->route('artikel.index')->with('sukses', $pesan);
            }
            $pesan = 'Artikel '.$request->judul.' gagal ditambahkan';
            return redirect()->route('artikel.index')->with('gagal', $pesan);
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
        $artikel = DB::table('post')
                    ->join('users','post.author', '=', 'users.id')
                    ->where('post.id', '=', $id)
                    ->select(
                        'post.id', 'users.name as author', 'post.judul',
                        'post.isi', 'post.gambar', 'post.created_at'
                    )
                    ->first();

        return view('staff.artikel.show', [
            'artikel' => $artikel,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Post::find($id);

        return view('staff.artikel.edit', [
            'artikel' => $artikel,
        ]);
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
        if ($request->exists('gambar')) {
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
                $artikel = Post::find($id);
                $artikelImage = public_path("/images/{$artikel->gambar}");
                if (\File::exists($artikelImage)) {
                    unlink($artikelImage);
                }
                $file = $request->file('gambar');
                $nama_file = time()."_".$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $file->move($destinationPath, $nama_file);
                $artikel->gambar = $nama_file;
                $artikel->judul = $request->judul;
                $artikel->isi = $request->isi;
                $artikelSave = $artikel->save();
                if ($artikelSave) {
                    $pesan = 'Artikel '.$request->judul.' berhasil diupdate';
                    return redirect()->route('artikel.index')->with('sukses', $pesan);
                }
                $pesan = 'Artikel '.$request->judul.' gagal diupdate';
                return redirect()->route('artikel.index')->with('gagal', $pesan);
            }
        }else{
            $validator = Validator::make($request->all(), [
                        'judul' => 'required|string',
                        'isi' => 'required',
                    ],
                    [
                        'judul.required' => 'Judul wajib diisi',
                        'judul.string' => 'format penulisan Judul tidak sesuai',
                        'isi.required' => 'Isi wajib diisi',
                    ]);
            if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }else{
                $artikel = Post::find($id);
                $artikel->judul = $request->judul;
                $artikel->isi = $request->isi;
                $artikelSave = $artikel->save();
                if ($artikelSave) {
                    $pesan = 'Artikel '.$request->judul.' berhasil diupdate';
                    return redirect()->route('artikel.index')->with('sukses', $pesan);
                }
                $pesan = 'Artikel '.$request->judul.' gagal diupdate';
                return redirect()->route('artikel.index')->with('gagal', $pesan);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Post::find($id);
        $artikelImage = public_path("/images/{$artikel->gambar}");
        unlink($artikelImage);
        $pesan = 'Artikel dengan judul '.$artikel->judul.' berhasil dihapus';
        $artikel->delete();
        return redirect()->route('artikel.index')->with('sukses', $pesan);
    }
}
