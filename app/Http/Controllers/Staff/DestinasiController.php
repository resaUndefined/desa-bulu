<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Model\Post;
use DB;
use Auth;


class DestinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinasi = DB::table('post')
                    ->join('users','post.author', '=', 'users.id')
                    ->where('post.kategori_id', '=', 2)
                    ->select('post.id', 'users.name as author', 'post.judul')
                    ->orderBy('post.id', 'DESC')
                    ->paginate(5);

        return view('staff.destinasi.index', [
            'destinasi' => $destinasi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.destinasi.create');
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
            $destinasi = new Post();
            $file = $request->file('gambar');
            $nama_file = time()."_".$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $nama_file);
            $destinasi->gambar = $nama_file;
            $destinasi->judul = $request->judul;
            $destinasi->isi = $request->isi;
            $destinasi->kategori_id = 2;
            $destinasi->author = Auth::id();
            $destinasiSave = $destinasi->save();
            if ($destinasiSave) {
                $pesan = 'Destinasi '.$request->judul.' berhasil ditambahkan';
                return redirect()->route('destinasi.index')->with('sukses', $pesan);
            }
            $pesan = 'Destinasi '.$request->judul.' gagal ditambahkan';
            return redirect()->route('destinasi.index')->with('gagal', $pesan);
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
        $destinasi = DB::table('post')
                    ->join('users','post.author', '=', 'users.id')
                    ->where('post.id', '=', $id)
                    ->select(
                        'post.id', 'users.name as author', 'post.judul',
                        'post.isi', 'post.gambar', 'post.created_at'
                    )
                    ->first();

        return view('staff.destinasi.show', [
            'destinasi' => $destinasi,
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
        $destinasi = Post::find($id);

        return view('staff.destinasi.edit', [
            'destinasi' => $destinasi,
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
                $destinasi = Post::find($id);
                $destinasiImage = public_path("/images/{$destinasi->gambar}");
                if (\File::exists($destinasiImage)) {
                    unlink($destinasiImage);
                }
                $file = $request->file('gambar');
                $nama_file = time()."_".$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $file->move($destinationPath, $nama_file);
                $destinasi->gambar = $nama_file;
                $destinasi->judul = $request->judul;
                $destinasi->isi = $request->isi;
                $destinasiSave = $destinasi->save();
                if ($destinasiSave) {
                    $pesan = 'Destinasi '.$request->judul.' berhasil diupdate';
                    return redirect()->route('destinasi.index')->with('sukses', $pesan);
                }
                $pesan = 'Destinasi '.$request->judul.' gagal diupdate';
                return redirect()->route('destinasi.index')->with('gagal', $pesan);
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
                $destinasi = Post::find($id);
                $destinasi->judul = $request->judul;
                $destinasi->isi = $request->isi;
                $destinasiSave = $destinasi->save();
                if ($destinasiSave) {
                    $pesan = 'Destinasi '.$request->judul.' berhasil diupdate';
                    return redirect()->route('destinasi.index')->with('sukses', $pesan);
                }
                $pesan = 'Destinasi '.$request->judul.' gagal diupdate';
                return redirect()->route('destinasi.index')->with('gagal', $pesan);
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
        $destinasi = Post::find($id);
        $destinasiImage = public_path("/images/{$destinasi->gambar}");
        unlink($destinasiImage);
        $pesan = 'Destinasi '.$destinasi->judul.' berhasil dihapus';
        $destinasi->delete();
        return redirect()->route('destinasi.index')->with('sukses', $pesan);
    }
}
