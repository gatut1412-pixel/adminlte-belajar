<?php

namespace App\Http\Controllers\Admin;

use App\kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class kategoricontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategori = kategori::all();
        return view ('Admin.kategoripelajaran.index')->with([
            'kategorikelas' => $kategori
        ]);
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
        $kategori = new kategori();
        $kategori->jenjang = $request->jenjang;
        $kategori->nama_kelas = $request->kategori_kelas;
        $kategori->save();
        return redirect()->back()->with('success', 'Berhasil menambahkan tahun ajaran: <b>'. $kategori->kategori_kelas.'</b>');
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
        $kategori = kategori::find($id);
        $kategori->jenjang = $request->jenjang;
        $kategori->kategori_kelas = $request->kategori_kelas;
        $kategori->save();
        return redirect()->back()->with('success', 'Berhasil merubah data kategori kelas.');
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
