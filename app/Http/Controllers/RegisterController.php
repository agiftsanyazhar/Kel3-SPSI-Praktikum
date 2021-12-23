<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register', [
            'title' => 'Register'
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
        $validatedData = $request->validate([
            'nama_mahasiswa'    => 'required|min:3|max:50',
            'alamat_mahasiswa'  => 'required|max:100',
            'hp'                => 'required|unique:dosens|unique:mahasiswas|unique:p_a_a_s',
            'email'             => 'required|email:dns|unique:dosens|unique:mahasiswas|unique:p_a_a_s',
            'password'          => 'required||min:8|max:32',
            'prodi'             => 'required|max:30',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        Mahasiswa::create($validatedData);
        
        $mahasiswaid = Mahasiswa::latest()->first()->id;

        DB::table('users')->insert([
            'id_mahasiswa'  => $mahasiswaid,
            'nama'          => $validatedData['nama_mahasiswa'],
            'email'         => $validatedData['email'],
            'password'      => $validatedData['password'],
            'role'          => 'Mahasiswa',
        ]);

        $request->session()->flash('success','Registrasi Berhasil! Silakan Login');

        return redirect('/');
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
}
