<?php

namespace App\Http\Controllers\Admin;

use App\kategori;
use App\matapelajaran;
use App\materi;
use App\soal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class soalcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $question = soal::all();
        $kelas = soal::with('soalkelas')->get();
        $bab = soal::with('soalmateri')->get();
        $pelajaran = soal::with('soalmapel')->get();
        return view('Admin.soal.index')->with([
            'soal' => $question,
            'materi' => $bab,
            'mapel' => $pelajaran,
            'kls' => $kelas
        ]);
//      dd($pelajaran);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $question = soal::all();
        $kelas = kategori::with('soalkelas')->get();
        $bab = materi::with('soalmateri')->get();
        $pelajaran = matapelajaran::with('soalmapel')->get();
        return view('Admin.soal.create')->with([
            'soal' => $question,
            'materi' => $bab,
            'mapel' => $pelajaran,
            'kls' => $kelas
        ]);
//      dd($pelajaran);
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
        $question = new soal();
        $question->soal = $request->soal;
        $question->id_kelas  = $request->kelas;
        $question->id_mapel  = $request->mapel;
        $question->id_materi = $request->materi;
        $question->jawaban_A  = $request->jawabanA;
        $question->jawaban_B  = $request->jawabanB;
        $question->jawaban_C  = $request->jawabanC;
        $question->jawaban_D  = $request->jawabanD;
        $question->jawaban   = $request->jawaban;
        $question->save();
        return redirect()->back()->with('success', 'Berhasil menambahkan soal: <b>'. $question->soal.'</b>');
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
//        $question = soal::find($id);
//        $kelas = kategori::with('soalkelas')->get();
//        $bab = materi::with('soalmateri')->get();
//        $pelajaran = matapelajaran::with('soalmapel')->get();
//        return view('Admin.soal.show')->with([
//            'soal' => $question,
//            'materi' => $bab,
//            'mapel' => $pelajaran,
//            'kls' => $kelas
//        ]);
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
        $question = soal::find($id);
        $kelas = kategori::with('soalkelas')->get();
        $bab = materi::with('soalmateri')->get();
        $pelajaran = matapelajaran::with('soalmapel')->get();
        return view('Admin.soal.edit')->with([
            'soal' => $question,
            'materi' => $bab,
            'mapel' => $pelajaran,
            'kls' => $kelas
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
        $question = soal::find($id);
        $question->soal = $request->soal;
        $question->id_kelas  = $request->kelas;
        $question->id_mapel  = $request->mapel;
        $question->id_materi = $request->materi;
        $question->jawaban_A  = $request->jawabanA;
        $question->jawaban_B  = $request->jawabanB;
        $question->jawaban_C  = $request->jawabanC;
        $question->jawaban_D  = $request->jawabanD;
        $question->jawaban   = $request->jawaban;
        $question->save();
        return redirect()->back()->with('success', 'Berhasil mengubah soal: <b>'. $question->soal.'</b>');

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

    // public function ajaxRequestPost1(Request $request)

    // {
    //     $materi = materi::where('id_mapel', $request->id_mapel)->get();
    //     /*$mapel = matapelajaran::whereHas('id_kelas', function ($q) use ($request){
    //         $q->where ('kelas_id', $request->kelas_id);
    //     })->get();*/
    //     return response()->json(['materi'=>$materi]);
    // }
}
