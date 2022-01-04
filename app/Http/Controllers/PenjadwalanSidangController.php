<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Nilai;
use App\Models\Penjadwalan_Sidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjadwalanSidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Nilai $id)
    {
        return view('dashboard.show.penjadwalan-sidang-table', [
            'jadwal_sidang'     => Penjadwalan_Sidang::where('id_nilai', $id->id)->get(),
            'nilai'             => $id,
            "title"             => "Penjadwalan Sidang",
            'counter'           => 1,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Nilai $id)
    {
        return view('dashboard.create.penjadwalan-sidang', [
            'jadwal_sidang'      => Penjadwalan_Sidang::where('id_nilai', $id->id)->get(),
            'nilai1'             => $id,
            'nilai2'             => Nilai::find($id),
            'dosens'             => Dosen::all(),
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
        $validatedData = $request->validate([
            'id_nilai'          => 'required',
            'dosen_penguji1'    => 'required',
            'dosen_penguji2'    => 'required',
            'dosen_penguji3'    => 'required',
        ]);
        
        Penjadwalan_Sidang::create($validatedData);

        $request->session()->flash('successJadwal','Jadwal Berhasil Ditambah!');

        return redirect('/nilai-table');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjadwalan_Sidang  $penjadwalan_Sidang
     * @return \Illuminate\Http\Response
     */
    public function show(Penjadwalan_Sidang $penjadwalan_Sidang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjadwalan_Sidang  $penjadwalan_Sidang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.edit.penjadwalan-sidang', [
            'jadwal_sidang'      => Penjadwalan_Sidang::find($id),
            'nilais'             => Nilai::all(),
            'dosens'             => Dosen::all(),
            'title'              => Penjadwalan_Sidang::find($id)->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjadwalan_Sidang  $penjadwalan_Sidang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjadwalan_Sidang $penjadwalan_Sidang)
    {
        DB::table('penjadwalan__sidangs')->where('id',$request['id'])->update([
            'id_nilai'          => $request['id_nilai'],
            'dosen_penguji1'    => $request['dosen_penguji1'],
            'dosen_penguji2'    => $request['dosen_penguji2'],
            'dosen_penguji3'    => $request['dosen_penguji3'],
        ]);

        return redirect('/nilai-table')->with('updateJadwal','Data Jadwal Berhasil Di-Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjadwalan_Sidang  $penjadwalan_Sidang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Penjadwalan_Sidang::find($id)->delete();

        $request->session()->flash('deleteJadwal','Jadwal Berhasil Dihapus!');

        return redirect('/nilai-table');
    }
}
