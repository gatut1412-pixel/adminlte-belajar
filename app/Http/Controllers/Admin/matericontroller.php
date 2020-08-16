<?php

namespace App\Http\Controllers\Admin;

use App\kategori;
use App\matapelajaran;
use App\materi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class matericontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = matapelajaran::all();
        $materi = materi::with('materipelajaran')->get();
        $kelas = kategori::with('materikelas')->get();
        return view ('Admin.materi.index')->with([
            'matpel' => $mapel,
            'mtr' => $materi,
            'kelas' => $kelas
        ]);

//        dd($materi);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $materi = new materi();
        $materi->nama_materi = $request->materi;
        $materi->id_mapel = $request->matapelajaran;
        $materi->nama_kelas = $request->kelas;
        $materi->file = $request->file('file')->store('file');;
        $materi->save();
        return redirect()->back()->with('success', 'Berhasil menambahkan tahun ajaran: <b>'. $materi->nama_materi.'</b>');
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
        //
        $mapel = matapelajaran::find($id);
        $pelajaran = matapelajaran::all();
        $materi = materi::with('materipelajaran')->get();
        $kelas = kategori::with('materikelas')->get();
        return view ('Admin.materi.edit')->with([
            'matpel' => $mapel,
            'mtr' => $materi,
            'kelas' => $kelas,
            'pljrn' => $pelajaran
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
        //
        $materi = materi::find($id);
        $materi->nama_materi = $request->materi;
        $materi->id_mapel = $request->mapel;
        $materi->nama_kelas = $request->kelas;
        $materi->file = $request->file('file')->store('file');;
        $materi->save();
        return redirect()->back()->with('success', 'Berhasil mengubah materi: <b>'. $materi->nama_materi.'</b>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ajaxRequestPost(Request $request)

    {
        $mapel = matapelajaran::where('id_kelas', $request->id_kelas)->get();
        /*$mapel = matapelajaran::whereHas('id_kelas', function ($q) use ($request){
            $q->where ('kelas_id', $request->kelas_id);
        })->get();*/
        return response()->json(['mapel'=>$mapel]);
    }

    public function ajaxRequestPostmateri(Request $request)

    {
        $materi = materi::where('id_mapel', $request->id_mapel)->get();
        /*$mapel = matapelajaran::whereHas('id_kelas', function ($q) use ($request){
            $q->where ('kelas_id', $request->kelas_id);
        })->get();*/
        return response()->json(['materi'=>$materi]);
    }

}
