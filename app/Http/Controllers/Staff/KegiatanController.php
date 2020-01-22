<?php

namespace App\Http\Controllers\Staff;

use App\Model\Kegiatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;


class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan = Kegiatan::paginate(10);

        return view('staff.kegiatan.index', [
            'kegiatan' => $kegiatan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.kegiatan.create');
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
                        'nama_kegiatan' => 'required|string',
                    ],
                    [
                        'nama_kegiatan.required' => 'Nama Kegiatan wajib diisi',
                        'nama_kegiatan.string' => 'format nama Kegiatan tidak sesuai',
                    ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $kegiatan = new Kegiatan();
            $kegiatan->nama_kegiatan = $request->nama_kegiatan;
            $kegiatanSave = $kegiatan->save();
            if ($kegiatanSave) {
                return redirect()->route('kegiatan.index')->with('sukses', 'Kegiatan berhasil ditambahkan');
            }
            return redirect()->route('kegiatan.index')->with('gagal', 'Kegiatan gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
        return view('staff.kegiatan.edit', [
            'kegiatan' => $kegiatan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validator = Validator::make($request->all(), [
                        'nama_kegiatan' => 'required|string',
                    ],
                    [
                        'nama_kegiatan.required' => 'Nama Kegiatan wajib diisi',
                        'nama_kegiatan.string' => 'format nama Kegiatan tidak sesuai',
                    ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $kegiatan->nama_kegiatan = $request->nama_kegiatan;
            $kegiatanSave = $kegiatan->save();
            if ($kegiatanSave) {
                return redirect()->route('kegiatan.index')->with('sukses', 'Kegiatan berhasil diupdate');
            }
            return redirect()->route('kegiatan.index')->with('gagal', 'Kegiatan gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        $pesanSukses = 'Kegiatan berhasil dihapus';
        return redirect()->route('kegiatan.index')->with('sukses', $pesanSukses);
    }
}
