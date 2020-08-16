<?php

namespace App\Http\Controllers\Admin;

use App\matapelajaran;
use App\user;
use App\materi;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class logincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();
        $materi = materi::all();
        $mapel = matapelajaran::all();
        return view('admin.index')->with([
            'user' => $user->count(),
            'materi' => $materi->count(),
            'mapel' => $mapel->count()
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

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            return redirect()->intended(route('admin.index'));
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error','Login failed, please try again!');
        }
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}
