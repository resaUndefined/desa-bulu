<?php

namespace App\Http\Controllers\Staff;

use App\Model\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;


class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masyarakat = Masyarakat::paginate(10);
        $jumLaki = null;
        $jumPerempuan = null;
        $total = null;
        foreach ($masyarakat as $key => $m) {
            $jumLaki+=$m->laki;
            $jumPerempuan+=$m->perempuan;
        }
        $total = $jumLaki + $jumPerempuan;
        return view('staff.masyarakat.index', [
            'masyarakat' => $masyarakat,
            'jumLaki' => $jumLaki,
            'jumPerempuan' => $jumPerempuan,
            'total' => $total,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.masyarakat.create');
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
                        'klasifikasi_umur' => 'required|string',
                        'laki' => 'required|integer',
                        'perempuan' => 'required|integer',
                    ],
                    [
                        'nama_fasilitas.required' => 'klasifikasi Umur wajib diisi',
                        'nama_fasilitas.string' => 'format klasifikasi Umur tidak sesuai',
                        'laki.required' => 'Jumlah Laki-Laki wajib diisi',
                        'laki.integer' => 'Jumlah Laki-Laki harus berupa angka',
                        'perempuan.required' => 'Jumlah Perempuan wajib diisi',
                        'perempuan.integer' => 'Jumlah Perempuan harus berupa angka',
                    ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $masyarakat = new Masyarakat();
            $masyarakat->klasifikasi_umur = $request->klasifikasi_umur;
            $masyarakat->laki = $request->laki;
            $masyarakat->perempuan = $request->perempuan;
            $masyarakatSave = $masyarakat->save();
            if ($masyarakatSave) {
                return redirect()->route('masyarakat.index')->with('sukses', 'Klasifikasi Umur Masyarakat berhasil ditambahkan');
            }
            return redirect()->route('masyarakat.index')->with('gagal', 'Klasifikasi Umur Masyarakat gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(Masyarakat $masyarakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(Masyarakat $masyarakat)
    {
        return view('staff.masyarakat.edit', [
            'masyarakat' => $masyarakat,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Masyarakat $masyarakat)
    {
        $validator = Validator::make($request->all(), [
                        'klasifikasi_umur' => 'required|string',
                        'laki' => 'required|integer',
                        'perempuan' => 'required|integer',
                    ],
                    [
                        'nama_fasilitas.required' => 'klasifikasi Umur wajib diisi',
                        'nama_fasilitas.string' => 'format klasifikasi Umur tidak sesuai',
                        'laki.required' => 'Jumlah Laki-Laki wajib diisi',
                        'laki.integer' => 'Jumlah Laki-Laki harus berupa angka',
                        'perempuan.required' => 'Jumlah Perempuan wajib diisi',
                        'perempuan.integer' => 'Jumlah Perempuan harus berupa angka',
                    ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $masyarakat->klasifikasi_umur = $request->klasifikasi_umur;
            $masyarakat->laki = $request->laki;
            $masyarakat->perempuan = $request->perempuan;
            $masyarakatSave = $masyarakat->save();
            if ($masyarakatSave) {
                return redirect()->route('masyarakat.index')->with('sukses', 'Klasifikasi Umur Masyarakat berhasil diupdate');
            }
            return redirect()->route('masyarakat.index')->with('gagal', 'Klasifikasi Umur Masyarakat gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masyarakat $masyarakat)
    {
        $masyarakat->delete();
        $pesanSukses = 'Data klasifikasi umur masyarakat berhasil dihapus';
        return redirect()->route('masyarakat.index')->with('sukses', $pesanSukses);
    }
}
