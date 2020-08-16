<?php

namespace App\Http\Controllers\Admin;

use App\matapelajaran;
use App\kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class matapelajarancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kelas = kategori::all();
        $mapel = matapelajaran::with('kelas')->get();
        return view ('Admin.matapelajaran.index')->with([
            'matpel' => $mapel,
            'kls' => $kelas
        ]);
//      dd($mapel);
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
        $mapel = new matapelajaran();
        $mapel->id_kelas = $request->kelas;
        $mapel->mata_pelajaran = $request->matapelajaran;
        $mapel->save();
        return redirect()->back()->with('success', 'Berhasil menambahkan tahun ajaran: <b>'. $mapel->mata_pelajaran.'</b>');
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
        $mapel = matapelajaran::find($id);
        $mapel->id_kelas = $request->kelas;
        $mapel->mata_pelajaran = $request->matpel;
        $mapel->save();
        return redirect()->back()->with('success', 'Berhasil mengubah Mata Pelajaran: <b>'. $mapel->mata_pelajaran.'</b>');
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
}
