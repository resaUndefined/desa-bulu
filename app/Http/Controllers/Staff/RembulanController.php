<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Detailkarang;
use App\Model\Karangtaruna;
use Validator;
use DB;


class RembulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rembulan = DB::table('karangtaruna')
        ->join('detailkarang', 'karangtaruna.id', '=', 'detailkarang.karangtaruna_id')
        ->where('karangtaruna.id','=',3)
        ->select('karangtaruna.id','karangtaruna.karang_taruna','detailkarang.id as detail_id', 'detailkarang.jabatan', 'detailkarang.pejabat')
        ->paginate(10);
        
        $karangTaruna = Karangtaruna::where('id',3)->first();

        return view('staff.rembulan.index', [
            'rembulan' => $rembulan,
            'karangTaruna' => $karangTaruna,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.rembulan.create');
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
                        'jabatan' => 'required|string',
                        'pejabat' => 'required|string',
                    ],
                    [
                        'jabatan.required' => 'Jabatan wajib diisi',
                        'jabatan.string' => 'format penulisan Jabatan tidak sesuai',
                        'pejabat.required' => 'Nama Pejabat wajib diisi',
                        'pejabat.string' => 'format penulisan Nama Pejabat tidak sesuai',
                    ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $id = 3;
            $rembulan = new Detailkarang();
            $rembulan->jabatan = $request->jabatan;
            $rembulan->pejabat = $request->pejabat;
            $rembulan->karangtaruna_id = $id;
            $rembulanSave = $rembulan->save();
            if ($rembulanSave) {
                $pesan = $request->jabatan.' berhasil ditambahkan';
                return redirect()->route('rembulan.index')->with('sukses', $pesan);
            }
            $pesan = $request->jabatan.' gagal ditambahkan';
            return redirect()->route('rembulan.index')->with('gagal', $pesan);
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
        $rembulan = Detailkarang::where('id',$id)->first();

        return view('staff.rembulan.edit', [
            'rembulan' => $rembulan,
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
        $validator = Validator::make($request->all(), [
                        'jabatan' => 'required|string',
                        'pejabat' => 'required|string',
                    ],
                    [
                        'jabatan.required' => 'Jabatan wajib diisi',
                        'jabatan.string' => 'format penulisan Jabatan tidak sesuai',
                        'pejabat.required' => 'Nama Pejabat wajib diisi',
                        'pejabat.string' => 'format penulisan Nama Pejabat tidak sesuai',
                    ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $rembulan = Detailkarang::where('id',$id)->first();
            $rembulan->jabatan = $request->jabatan;
            $rembulan->pejabat = $request->pejabat;
            $rembulanSave = $rembulan->save();
            if ($rembulanSave) {
                $pesan = $request->jabatan.' berhasil diupdate';
                return redirect()->route('rembulan.index')->with('sukses', $pesan);
            }
            $pesan = $request->jabatan.' gagal diupdate';
            return redirect()->route('rembulan.index')->with('gagal', $pesan);
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
        $rembulan = Detailkarang::where('id',$id)->first();
        $pesanSukses = $rembulan->jabatan.' dan '.$rembulan->pejabat.' berhasil dihapus';
        $rembulan->delete();
        return redirect()->route('rembulan.index')->with('sukses', $pesanSukses);
    }
}
