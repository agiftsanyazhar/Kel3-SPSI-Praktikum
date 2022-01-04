<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.nilai-table', [
            'nilais'    => Nilai::all(),
            "title"     => "Nilai",
            'counter'   => 1,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create.nilai', [
            "title" => "Tambah Nilai"
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
            'nilai_presentasi'              => 'required',
            'nilai_buku_proposal'           => 'required',
            'nilai_ide_inovasi_proposal'    => 'required',
        ]);
        
        Nilai::create($validatedData);

        $request->session()->flash('success','Nilai Berhasil Ditambah!');

        return redirect('/nilai-table');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai, $id)
    {
        return view('dashboard.edit.nilai', [
            'nilais'    => Nilai::find($id),
            "title"     => "Edit Nilai",
            'counter'   => 1,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        DB::table('nilais')->where('id',$request['id'])->update([
            'nilai_presentasi'              => $request['nilai_presentasi'],
            'nilai_buku_proposal'           => $request['nilai_buku_proposal'],
            'nilai_ide_inovasi_proposal'    => $request['nilai_ide_inovasi_proposal'],
        ]);

        return redirect('/nilai-table')->with('update','Data Nilai Berhasil Di-Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai,$id)
    {
        Nilai::find($id)->delete();

        return redirect('/nilai-table')->with('delete','Nilai Berhasil Dihapus!');
    }
}
