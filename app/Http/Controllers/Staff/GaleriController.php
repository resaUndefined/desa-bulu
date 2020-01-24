<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Model\Galeri;


class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri = Galeri::paginate(5);

        return view('staff.galeri.index', [
            'galeri' => $galeri,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.galeri.create');
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
                        'caption' => 'required|string',
                    ],
                    [
                        'gambar.required' => 'Gambar belum dipilih',
                        'gambar.image' => 'File harus berupa gambar',
                        'gambar.mimes' => 'Format file hanya boleh ber ekstensi .jpg/.jpeg/.png',
                        'gambar.max' => 'Ukuran file maksimal 1 mb',
                        'caption.required' => 'Caption wajib diisi',
                        'caption.string' => 'format penulisan Caption tidak sesuai',
                    ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $galeri = new Galeri();
            $file = $request->file('gambar');
            $nama_file = time()."_".$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $nama_file);
            $galeri->gambar = $nama_file;
            $galeri->caption = $request->caption;
            $galeriSave = $galeri->save();
            if ($galeriSave) {
                $pesan = 'galery dengan caption '.$request->caption.' berhasil ditambahkan';
                return redirect()->route('galeri.index')->with('sukses', $pesan);
            }
            $pesan = 'galery dengan caption '.$request->caption.' gagal ditambahkan';
            return redirect()->route('galeri.index')->with('gagal', $pesan);
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
        $galeri = Galeri::where('id',$id)->first();

        return view('staff.galeri.edit', [
            'galeri' => $galeri,
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
                        'caption' => 'required|string',
                    ],
                    [
                        'gambar.required' => 'Gambar belum dipilih',
                        'gambar.image' => 'File harus berupa gambar',
                        'gambar.mimes' => 'Format file hanya boleh ber ekstensi .jpg/.jpeg/.png',
                        'gambar.max' => 'Ukuran file maksimal 1 mb',
                        'caption.required' => 'Caption wajib diisi',
                        'caption.string' => 'format penulisan Caption tidak sesuai',
                    ]);

            if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }else{
                $galeri = Galeri::find($id);
                $galeriImage = public_path("/images/{$galeri->gambar}");
                if (\File::exists($galeriImage)) {
                    unlink($galeriImage);
                }
                $file = $request->file('gambar');
                $nama_file = time()."_".$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $file->move($destinationPath, $nama_file);
                $galeri->gambar = $nama_file;
                $galeri->caption = $request->caption;
                $galeriSave = $galeri->save();
                if ($galeriSave) {
                    $pesan = 'Gambar dengan '.$request->caption.' berhasil diupdate';
                    return redirect()->route('galeri.index')->with('sukses', $pesan);
                }
                $pesan = 'Gambar dengan '.$request->caption.' gagal diupdate';
                return redirect()->route('galeri.index')->with('gagal', $pesan);
            }
        }else{
            $validator = Validator::make($request->all(), [
                        'caption' => 'required|string',
                    ],
                    [
                        'caption.required' => 'Caption wajib diisi',
                        'caption.string' => 'format penulisan Caption tidak sesuai',
                    ]);
            if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }else{
                $galeri = Galeri::find($id);
                $galeri->caption = $request->caption;
                $galeriSave = $galeri->save();
                if ($galeriSave) {
                    $pesan = 'Caption '.$request->caption.' berhasil diupdate';
                    return redirect()->route('galeri.index')->with('sukses', $pesan);
                }
                $pesan = 'Caption '.$request->caption.' gagal diupdate';
                return redirect()->route('galeri.index')->with('gagal', $pesan);
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
        $galeri = Galeri::find($id);
        $galeriImage = public_path("/images/{$galeri->gambar}");
        unlink($galeriImage);
        $pesan = 'Galery dengan caption '.$galeri->caption.' berhasil dihapus';
        $galeri->delete();
        return redirect()->route('galeri.index')->with('sukses', $pesan);
    }
}
