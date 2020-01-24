<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Model\Post;
use DB;
use Auth;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = DB::table('post')
                    ->join('users','post.author', '=', 'users.id')
                    ->where('post.kategori_id', '=', 3)
                    ->select('post.id', 'users.name as author', 'post.judul')
                    ->orderBy('post.id', 'DESC')
                    ->paginate(5);

        return view('staff.event.index', [
            'event' => $event,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.event.create');
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
            $event = new Post();
            $file = $request->file('gambar');
            $nama_file = time()."_".$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $nama_file);
            $event->gambar = $nama_file;
            $event->judul = $request->judul;
            $event->isi = $request->isi;
            $event->kategori_id = 3;
            $event->author = Auth::id();
            $eventSave = $event->save();
            if ($eventSave) {
                $pesan = 'Event '.$request->judul.' berhasil ditambahkan';
                return redirect()->route('event.index')->with('sukses', $pesan);
            }
            $pesan = 'Event '.$request->judul.' gagal ditambahkan';
            return redirect()->route('event.index')->with('gagal', $pesan);
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
        $event = DB::table('post')
                    ->join('users','post.author', '=', 'users.id')
                    ->where('post.id', '=', $id)
                    ->select(
                        'post.id', 'users.name as author', 'post.judul',
                        'post.isi', 'post.gambar', 'post.created_at'
                    )
                    ->first();

        return view('staff.event.show', [
            'event' => $event,
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
        $event = Post::find($id);

        return view('staff.event.edit', [
            'event' => $event,
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
                $event = Post::find($id);
                $eventImage = public_path("/images/{$event->gambar}");
                if (\File::exists($eventImage)) {
                    unlink($eventImage);
                }
                $file = $request->file('gambar');
                $nama_file = time()."_".$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $file->move($destinationPath, $nama_file);
                $event->gambar = $nama_file;
                $event->judul = $request->judul;
                $event->isi = $request->isi;
                $eventSave = $event->save();
                if ($eventSave) {
                    $pesan = 'Event '.$request->judul.' berhasil diupdate';
                    return redirect()->route('event.index')->with('sukses', $pesan);
                }
                $pesan = 'Event '.$request->judul.' gagal diupdate';
                return redirect()->route('event.index')->with('gagal', $pesan);
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
                $event = Post::find($id);
                $event->judul = $request->judul;
                $event->isi = $request->isi;
                $eventSave = $event->save();
                if ($eventSave) {
                    $pesan = 'Event '.$request->judul.' berhasil diupdate';
                    return redirect()->route('event.index')->with('sukses', $pesan);
                }
                $pesan = 'Event '.$request->judul.' gagal diupdate';
                return redirect()->route('event.index')->with('gagal', $pesan);
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
        $event = Post::find($id);
        $eventImage = public_path("/images/{$event->gambar}");
        unlink($eventImage);
        $pesan = 'event dengan judul '.$event->judul.' berhasil dihapus';
        $event->delete();
        return redirect()->route('event.index')->with('sukses', $pesan);
    }
}
