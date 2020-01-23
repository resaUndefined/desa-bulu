<?php

namespace App\Http\Controllers\Staff;

use App\Model\Rt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;


class RtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rt = Rt::paginate(10);
        $total = null;
        foreach ($rt as $key => $value) {
            $total+=$value->jml_kk;
        }
        return view('staff.rt.index', [
            'rt' => $rt,
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
        return view('staff.rt.create');
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
                        'nama_rt' => 'required|string',
                        'ketua_rt' => 'required|string',
                        'jml_kk' => 'required|integer',
                    ],
                    [
                        'nama_rt.required' => 'RT wajib diisi',
                        'nama_rt.string' => 'format nama RT tidak sesuai',
                        'ketua_rt.required' => 'Nama Ketua RT wajib diisi',
                        'ketua_rt.string' => 'Format nama Ketua RT tidak sesuai',
                        'jml_kk.required' => 'Jumlah KK wajib diisi',
                        'jml_kk.integer' => 'Jumlah KK harus berupa angka',
                    ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $rt = new Rt();
            $rt->nama_rt = $request->nama_rt;
            $rt->ketua_rt = $request->ketua_rt;
            $rt->jml_kk = $request->jml_kk;
            $rtSave = $rt->save();
            if ($rtSave) {
                $pesan = $request->nama_rt.' berhasil ditambahkan';
                return redirect()->route('rt.index')->with('sukses', $pesan);
            }
            $pesan = $request->nama_rt.' gagal ditambahkan';
            return redirect()->route('rt.index')->with('gagal', $pesan);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Rt  $rt
     * @return \Illuminate\Http\Response
     */
    public function show(Rt $rt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Rt  $rt
     * @return \Illuminate\Http\Response
     */
    public function edit(Rt $rt)
    {
        return view('staff.rt.edit', [
            'rt' => $rt,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Rt  $rt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rt $rt)
    {
        $validator = Validator::make($request->all(), [
                        'nama_rt' => 'required|string',
                        'ketua_rt' => 'required|string',
                        'jml_kk' => 'required|integer',
                    ],
                    [
                        'nama_rt.required' => 'RT wajib diisi',
                        'nama_rt.string' => 'format nama RT tidak sesuai',
                        'ketua_rt.required' => 'Nama Ketua RT wajib diisi',
                        'ketua_rt.string' => 'Format nama Ketua RT tidak sesuai',
                        'jml_kk.required' => 'Jumlah KK wajib diisi',
                        'jml_kk.integer' => 'Jumlah KK harus berupa angka',
                    ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $rt->nama_rt = $request->nama_rt;
            $rt->ketua_rt = $request->ketua_rt;
            $rt->jml_kk = $request->jml_kk;
            $rtSave = $rt->save();
            if ($rtSave) {
                $pesan = $request->nama_rt.' berhasil diupdate';
                return redirect()->route('rt.index')->with('sukses', $pesan);
            }
            $pesan = $request->nama_rt.' gagal diupdate';
            return redirect()->route('rt.index')->with('gagal', $pesan);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Rt  $rt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rt $rt)
    {
        $pesanSukses = 'RT '.$rt->nama_rt.' berhasil dihapus';
        $rt->delete();
        return redirect()->route('rt.index')->with('sukses', $pesanSukses);
    }
}
