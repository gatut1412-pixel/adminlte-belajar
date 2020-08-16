<?php

namespace App\Http\Controllers\Admin;

use App\kategori;
use App\matapelajaran;
use App\materi;
use App\soal;
use App\ujian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ujiancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ujian = ujian::all();
        $ujiankelas = kategori::with('ujiankelas')->get();
        $ujimateri = materi::with('ujianmateri')->get();
        $ujipelajaran = matapelajaran::with('ujianmapel')->get();
       return view ('Admin.ujian.index')->with([
           'materi' => $ujimateri,
           'mapel' => $ujipelajaran,
           'kls' => $ujiankelas,
       ]);
        // dd($ujipelajaran);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('Admin.ujian.create');
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

    public function ajaxRequestPostmapel(Request $request)

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
