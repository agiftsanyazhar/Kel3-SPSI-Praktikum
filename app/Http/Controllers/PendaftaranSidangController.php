<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran_Sidang;
use Illuminate\Http\Request;

class PendaftaranSidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create.sidang', [
            "title" => "Daftar Sidang"
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftaran_Sidang  $pendaftaran_Sidang
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran_Sidang $pendaftaran_Sidang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftaran_Sidang  $pendaftaran_Sidang
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftaran_Sidang $pendaftaran_Sidang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendaftaran_Sidang  $pendaftaran_Sidang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendaftaran_Sidang $pendaftaran_Sidang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran_Sidang  $pendaftaran_Sidang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftaran_Sidang $pendaftaran_Sidang)
    {
        //
    }
}
