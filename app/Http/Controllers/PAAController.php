<?php

namespace App\Http\Controllers;

use App\Models\PAA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PAAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nama_paa'          => 'required|min:3|max:50',
            'alamat_paa'        => 'required|max:100',
            'hp'                => 'required|unique:dosens|unique:mahasiswas|unique:paas',
            'email'             => 'required|email:dns|unique:dosens|unique:mahasiswas|unique:paas',
            'password'          => 'required||min:8|max:32',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        PAA::create($validatedData);
        
        $paaid = PAA::latest()->first()->id;

        DB::table('users')->insert([
            'nip'           => $paaid,
            'nama'          => $validatedData['nama_paa'],
            'email'         => $validatedData['email'],
            'password'      => $validatedData['password'],
            'role'          => 'PAA',
        ]);

        $request->session()->flash('success','Registrasi Berhasil! Silakan Login');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PAA  $pAA
     * @return \Illuminate\Http\Response
     */
    public function show(PAA $pAA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PAA  $pAA
     * @return \Illuminate\Http\Response
     */
    public function edit(PAA $pAA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PAA  $pAA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PAA $pAA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PAA  $pAA
     * @return \Illuminate\Http\Response
     */
    public function destroy(PAA $pAA)
    {
        //
    }
}
