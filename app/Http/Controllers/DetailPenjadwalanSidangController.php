<?php

namespace App\Http\Controllers;

use App\Models\Detail_Penjadwalan_Sidang;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran_Sidang;
use Illuminate\Http\Request;

class DetailPenjadwalanSidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('dashboard.show.detail-penjadwalan-sidang', [
            'detail'            => Detail_Penjadwalan_Sidang::where('id_daftar_sidang', $id)->with('pendaftaransidang')->get(),
            'mahasiswa'         => Pendaftaran_Sidang::find($id)->mahasiswa->nama_mahasiswa,
            // 'nim'               => Pendaftaran_Sidang::find($id)->mahasiswa->nim,
            'id'                => Pendaftaran_Sidang::find($id)->id,
            'counter'           => 1
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
     * @param  \App\Models\Detail_Penjadwalan_Sidang  $detail_Penjadwalan_Sidang
     * @return \Illuminate\Http\Response
     */
    public function show(Detail_Penjadwalan_Sidang $detail_Penjadwalan_Sidang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detail_Penjadwalan_Sidang  $detail_Penjadwalan_Sidang
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail_Penjadwalan_Sidang $detail_Penjadwalan_Sidang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detail_Penjadwalan_Sidang  $detail_Penjadwalan_Sidang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail_Penjadwalan_Sidang $detail_Penjadwalan_Sidang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detail_Penjadwalan_Sidang  $detail_Penjadwalan_Sidang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail_Penjadwalan_Sidang $detail_Penjadwalan_Sidang)
    {
        //
    }
}
