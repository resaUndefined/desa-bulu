<?php

namespace App\Http\Controllers\Staff;

use App\Model\Batasdesa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;


class BatasDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batasDesa = Batasdesa::paginate();

        return view('staff.batas-desa.index', [
            'batasDesa' => $batasDesa,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.batas-desa.create');
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
                        'mata_angin' => 'required|string',
                        'nama_batas' => 'required|string',
                    ],
                    [
                        'mata_angin.required' => 'Mata Angin wajib diisi',
                        'mata_angin.string' => 'format penulisan Mata Angin tidak sesuai',
                        'nama_batas.required' => 'Nama Batas Dukuh wajib diisi',
                        'nama_batas.string' => 'format penulisan Nama Batas tidak sesuai',
                    ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $batasDesa = new Batasdesa();
            $batasDesa->mata_angin = $request->mata_angin;
            $batasDesa->nama_batas = $request->nama_batas;
            $batasDesaSave = $batasDesa->save();
            if ($batasDesaSave) {
                return redirect()->route('batas-dusun.index')->with('sukses', 'Batas Dusun berhasil ditambahkan');
            }
            return redirect()->route('batas-dusun.index')->with('gagal', 'Batas Dusun gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Batasdesa  $batasdesa
     * @return \Illuminate\Http\Response
     */
    public function show(Batasdesa $batasdesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Batasdesa  $batasdesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Batasdesa $batas_dusun)
    {
        return view('staff.batas-desa.edit', [
            'batasDesa' => $batas_dusun,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Batasdesa  $batasdesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batasdesa $batas_dusun)
    {
        $validator = Validator::make($request->all(), [
                        'mata_angin' => 'required|string',
                        'nama_batas' => 'required|string',
                    ],
                    [
                        'mata_angin.required' => 'Mata Angin wajib diisi',
                        'mata_angin.string' => 'format penulisan Mata Angin tidak sesuai',
                        'nama_batas.required' => 'Nama Batas Dukuh wajib diisi',
                        'nama_batas.string' => 'format penulisan Nama Batas tidak sesuai',
                    ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $batas_dusun->mata_angin = $request->mata_angin;
            $batas_dusun->nama_batas = $request->nama_batas;
            $batasDesaSave = $batas_dusun->save();
            if ($batasDesaSave) {
                return redirect()->route('batas-dusun.index')->with('sukses', 'Batas Dusun berhasil diupdate');
            }
            return redirect()->route('batas-dusun.index')->with('gagal', 'Batas Dusun gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Batasdesa  $batasdesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batasdesa $batas_dusun)
    {
        $batas_dusun->delete();
        $pesanSukses = 'Batas Dusun berhasil dihapus';
        return redirect()->route('batas-dusun.index')->with('sukses', $pesanSukses);
    }
}
