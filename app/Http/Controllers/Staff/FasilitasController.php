<?php

namespace App\Http\Controllers\Staff;

use App\Model\Fasilitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;


class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitas = Fasilitas::paginate(10);

        return view('staff.fasilitas.index', [
            'fasilitas' => $fasilitas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.fasilitas.create');
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
                        'nama_fasilitas' => 'required|string',
                    ],
                    [
                        'nama_fasilitas.required' => 'Nama Fasilitas wajib diisi',
                        'nama_fasilitas.string' => 'format nama Fasilitas tidak sesuai',
                    ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $fasilitas = new Fasilitas();
            $fasilitas->nama_fasilitas = $request->nama_fasilitas;
            $fasilitasSave = $fasilitas->save();
            if ($fasilitasSave) {
                return redirect()->route('fasilitas.index')->with('sukses', 'Fasilitas berhasil ditambahkan');
            }
            return redirect()->route('fasilitas.index')->with('gagal', 'Fasilitas gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function show(Fasilitas $fasilitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function edit(Fasilitas $fasilita)
    {
        return view('staff.fasilitas.edit', [
            'fasilitas' => $fasilita,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fasilitas $fasilita)
    {
        $validator = Validator::make($request->all(), [
                        'nama_fasilitas' => 'required|string',
                    ],
                    [
                        'nama_fasilitas.required' => 'Nama Fasilitas wajib diisi',
                        'nama_fasilitas.string' => 'format nama Fasilitas tidak sesuai',
                    ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $fasilita->nama_fasilitas = $request->nama_fasilitas;
            $fasilitasSave = $fasilita->save();
            if ($fasilitasSave) {
                return redirect()->route('fasilitas.index')->with('sukses', 'Fasilitas berhasil diupdate');
            }
            return redirect()->route('fasilitas.index')->with('gagal', 'Fasilitas gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fasilitas $fasilita)
    {
        $fasilita->delete();
        $pesanSukses = 'Fasilitas berhasil dihapus';
        return redirect()->route('fasilitas.index')->with('sukses', $pesanSukses);
    }
}
