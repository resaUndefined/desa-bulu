<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Karangtaruna;
use App\Model\Detailkarang;
use Validator;
use DB;


class KartaBuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kartaBule = DB::table('karangtaruna')
        ->join('detailkarang', 'karangtaruna.id', '=', 'detailkarang.karangtaruna_id')
        ->where('karangtaruna.id','=',1)
        ->select('karangtaruna.id','karangtaruna.karang_taruna','detailkarang.id as detail_id', 'detailkarang.jabatan', 'detailkarang.pejabat')
        ->paginate(10);
        
        return view('staff.karang-taruna1.index', [
            'kartaBule' => $kartaBule,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.karang-taruna1.create');
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
            $id = 1;
            $kartaBule = new Detailkarang();
            $kartaBule->jabatan = $request->jabatan;
            $kartaBule->pejabat = $request->pejabat;
            $kartaBule->karangtaruna_id = $id;
            $kartaBuleSave = $kartaBule->save();
            if ($kartaBuleSave) {
                $pesan = $request->jabatan.' berhasil ditambahkan';
                return redirect()->route('karta-bule.index')->with('sukses', $pesan);
            }
            $pesan = $request->jabatan.' gagal ditambahkan';
            return redirect()->route('karta-bule.index')->with('gagal', $pesan);
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
        $kartaBule = Detailkarang::where('id',$id)->first();

        return view('staff.karang-taruna1.edit', [
            'kartaBule' => $kartaBule,
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
            $kartaBule = Detailkarang::where('id',$id)->first();
            $kartaBule->jabatan = $request->jabatan;
            $kartaBule->pejabat = $request->pejabat;
            $kartaBuleSave = $kartaBule->save();
            if ($kartaBuleSave) {
                $pesan = $request->jabatan.' berhasil diupdate';
                return redirect()->route('karta-bule.index')->with('sukses', $pesan);
            }
            $pesan = $request->jabatan.' gagal diupdate';
            return redirect()->route('karta-bule.index')->with('gagal', $pesan);
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
        $kartaBule = Detailkarang::where('id',$id)->first();
        $pesanSukses = $kartaBule->jabatan.' dan '.$kartaBule->pejabat.' berhasil dihapus';
        $kartaBule->delete();
        return redirect()->route('karta-bule.index')->with('sukses', $pesanSukses);
    }
}
