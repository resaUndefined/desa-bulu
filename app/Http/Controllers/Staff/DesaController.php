<?php

namespace App\Http\Controllers\Staff;

use App\Model\Desa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;


class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desa = Desa::first();

        return view('staff.desa.index',[
            'desa' => $desa,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.desa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $desa = Desa::first();
        if (!is_null($desa)) {
            return redirect()->route('dusun.index')->with('gagal', 'Dusun sudah pernah ditambahkan');
        }
        $validator = Validator::make($request->all(), [
                        'desa' => 'required|string',
                        'kepala_dukuh' => 'required|string',
                        'ketua_rw' => 'required|string',
                        'ketua_pkk' => 'required|string',
                    ],
                    [
                        'desa.required' => 'Nama Dusun wajib diisi',
                        'desa.string' => 'format nama Dusun tidak sesuai',
                        'kepala_dukuh.required' => 'Nama Kepala Dukuh wajib diisi',
                        'kepala_dukuh.string' => 'format nama Kepala Dukuh tidak sesuai',
                        'ketua_rw.required' => 'Nama Ketua RW wajib diisi',
                        'ketua_rw.string' => 'format nama Ketua RW tidak sesuai',
                        'ketua_pkk.required' => 'Ketua PKK wajib diisi',
                        'ketua_pkk.string' => 'format nama Ketua PKK tidak sesuai',
                    ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $desa = new Desa();
            $desa->desa = $request->desa;
            $desa->kepala_dukuh = $request->kepala_dukuh;
            $desa->ketua_rw = $request->ketua_rw;
            $desa->ketua_pkk = $request->ketua_pkk;
            $desaSave = $desa->save();
            if ($desaSave) {
                return redirect()->route('dusun.index')->with('sukses', 'Dusun berhasil ditambahkan');
            }
            return redirect()->route('dusun.index')->with('gagal', 'Dusun gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function show(Desa $desa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function edit(Desa $desa)
    {
        $desa = Desa::first();
        if (is_null($desa)) {
            return redirect()->route('dusun.index')->with('gagal', 'Dusun belum ada, silakan tambahkan terlebih dahulu');
        }
        return view('staff.desa.edit', [
            'desa' => $desa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Desa $desa)
    {
        $validator = Validator::make($request->all(), [
                        'desa' => 'required|string',
                        'kepala_dukuh' => 'required|string',
                        'ketua_rw' => 'required|string',
                        'ketua_pkk' => 'required|string',
                    ],
                    [
                        'desa.required' => 'Nama Dusun wajib diisi',
                        'desa.string' => 'format nama Dusun tidak sesuai',
                        'kepala_dukuh.required' => 'Nama Kepala Dukuh wajib diisi',
                        'kepala_dukuh.string' => 'format nama Kepala Dukuh tidak sesuai',
                        'ketua_rw.required' => 'Nama Ketua RW wajib diisi',
                        'ketua_rw.string' => 'format nama Ketua RW tidak sesuai',
                        'ketua_pkk.required' => 'Ketua PKK wajib diisi',
                        'ketua_pkk.string' => 'format nama Ketua PKK tidak sesuai',
                    ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $desa = Desa::where('id', $request->id_desa)->first();
            $desa->desa = $request->desa;
            $desa->kepala_dukuh = $request->kepala_dukuh;
            $desa->ketua_rw = $request->ketua_rw;
            $desa->ketua_pkk = $request->ketua_pkk;
            $desaSave = $desa->save();
            if ($desaSave) {
                return redirect()->route('dusun.index')->with('sukses', 'Dusun berhasil diupdate');
            }
            return redirect()->route('dusun.index')->with('gagal', 'Dusun gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desa $desa)
    {
        $desa = Desa::first();
        if (is_null($desa)) {
            return redirect()->route('dusun.index')->with('gagal', 'Dusun belum ada, silakan tambahkan terlebih dahulu');
        }
        $desa->delete();
        $pesanSukses = 'Dusun berhasil dihapus';
        return redirect()->route('dusun.index')->with('sukses', $pesanSukses);
    }
}
