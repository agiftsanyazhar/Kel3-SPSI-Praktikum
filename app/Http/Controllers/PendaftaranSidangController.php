<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran_Sidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendaftaranSidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $mahasiswa  = Mahasiswa::find($id);
        return view('dashboard.show.sidang-table', [
            'jadwal_sidang'     => Pendaftaran_Sidang::where('nim', $id)->orderby('tgl_daftar_sidang', 'desc')->with('dosen')->get(),
            "title"             => $mahasiswa->nama_mahasiswa,
            "nim"               => $id,
            'counter'           => 1,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create.sidang', [
            'daftar_sidang'     => Pendaftaran_Sidang::all(),
            'dosens'            => Dosen::all(),
            "title"             => "Daftar Sidang",
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
            'nid'           => 'required',
            'nim'           => 'required',
            'proposal'      => 'required|file',
            'khs'           => 'required|file',
            'toefl'         => 'required|file',
        ]);

        //Proposal
        $proposal           = $request->file('proposal');
        $target_dirprop     = "upload-proposal";
        $target_fileprop    = $target_dirprop . basename($_FILES['proposal']['name']);
        $propFileType       = strtolower(pathinfo($target_fileprop,PATHINFO_EXTENSION));
        $proposal->move($target_dirprop,$proposal->getClientOriginalName());
        
        //KHS
        $khs               = $request->file('khs');
        $target_dirkhs     = "upload-khs";
        $target_filekhs    = $target_dirkhs . basename($_FILES['khs']['name']);
        $khsFileType       = strtolower(pathinfo($target_filekhs,PATHINFO_EXTENSION));
        $khs->move($target_dirkhs,$khs->getClientOriginalName());
        
        //TOEFL
        $toefl              = $request->file('toefl');
        $target_dirtoefl    = "upload-toefl";
        $target_filetoefl   = $target_dirtoefl . basename($_FILES['toefl']['name']);
        $toeflFileType      = strtolower(pathinfo($target_filetoefl,PATHINFO_EXTENSION));
        $toefl->move($target_dirtoefl,$toefl->getClientOriginalName());

        if($request->file('proposal')){
            $validatedData['proposal']  = basename($_FILES['proposal']['name']);
        } if ($request->file('khs')){
            $validatedData['khs']  = basename($_FILES['khs']['name']);
        } if($request->file('toefl')){
            $validatedData['toefl']  = basename($_FILES['toefl']['name']);
        }

        Pendaftaran_Sidang::create($validatedData);

        $request->session()->flash('successSidang','Registrasi Berhasil! Semoga Sukses');

        return redirect('/mahasiswa-table');
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
    public function edit(Pendaftaran_Sidang $pendaftaran_Sidang, $id)
    {
        return view('dashboard.edit.sidang', [
            'daftar_sidang'     => Pendaftaran_Sidang::find($id),
            'dosens'            => Dosen::all(),
            "title"             => 'Edit Sidang'
        ]);
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
        //Proposal
        $proposal           = $request->file('proposal');
        $target_dirprop     = "upload-proposal";
        $target_fileprop    = $target_dirprop . basename($_FILES['proposal']['name']);
        $propFileType       = strtolower(pathinfo($target_fileprop,PATHINFO_EXTENSION));
        $proposal->move($target_dirprop,$proposal->getClientOriginalName());
        
        //KHS
        $khs               = $request->file('khs');
        $target_dirkhs     = "upload-khs";
        $target_filekhs    = $target_dirkhs . basename($_FILES['khs']['name']);
        $khsFileType       = strtolower(pathinfo($target_filekhs,PATHINFO_EXTENSION));
        $khs->move($target_dirkhs,$khs->getClientOriginalName());
        
        //TOEFL
        $toefl              = $request->file('toefl');
        $target_dirtoefl    = "upload-toefl";
        $target_filetoefl   = $target_dirtoefl . basename($_FILES['toefl']['name']);
        $toeflFileType      = strtolower(pathinfo($target_filetoefl,PATHINFO_EXTENSION));
        $toefl->move($target_dirtoefl,$toefl->getClientOriginalName());

        DB::table('pendaftaran__sidangs')->where('id',$request['id'])->update([
            'proposal'      => basename($_FILES['proposal']['name']),
            'khs'           => basename($_FILES['khs']['name']),
            'toefl'         => basename($_FILES['toefl']['name']),
        ]);

        return redirect('/mahasiswa-table')->with('updateSidang','Data Sidang Berhasil Di-Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran_Sidang  $pendaftaran_Sidang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftaran_Sidang $pendaftaran_Sidang, $id)
    {
        Pendaftaran_Sidang::find($id)->delete();

        return redirect('/mahasiswa-table')->with('deleteSidang','Sidang Berhasil Dihapus!');
    }
}
