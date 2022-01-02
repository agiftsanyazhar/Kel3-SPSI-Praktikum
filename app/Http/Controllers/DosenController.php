<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.dosen-table', [
            "title" => "Dosen"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create.dosen', [
            "title" => "Daftar Dosen"
        ]);
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

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nama_dosen'        => 'required|min:3|max:50',
            'alamat_dosen'      => 'required|max:100',
            'hp'                => 'required|unique:dosens|unique:mahasiswas|unique:paas',
            'email'             => 'required|email:dns|unique:dosens|unique:mahasiswas|unique:paas',
            'password'          => 'required||min:8|max:32',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        Dosen::create($validatedData);
        
        $dosenid = Dosen::latest()->first()->id;

        DB::table('users')->insert([
            'nid'           => $dosenid,
            'nama'          => $validatedData['nama_dosen'],
            'email'         => $validatedData['email'],
            'password'      => $validatedData['password'],
            'role'          => 'Dosen',
        ]);

        $request->session()->flash('success','Registrasi Berhasil! Silakan Login');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        //
    }
}
