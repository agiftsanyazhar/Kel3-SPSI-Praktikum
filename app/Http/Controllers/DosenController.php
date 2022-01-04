<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'dosens'    => Dosen::all(),
            "title"     => "Dosen",
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

        $request->session()->flash('success','Dosen Berhasil Ditambah!');

        return redirect('/dosen-table');
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
    public function edit(Dosen $dosen, $id)
    {
        return view('dashboard.edit.dosen', [
            'dosen' => Dosen::find($id),
            "title" => "Edit Dosen"
        ]);
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
        DB::table('dosens')->where('id',$request['id'])->update([
            'alamat_dosen'  => $request['alamat_dosen'],
            'hp'            => $request['hp'],
            'email'         => $request['email'],
            'password'      => Hash::make($request->newPassword)
        ]);

        return redirect('/dosen-table')->with('update','Data Dosen Berhasil Di-Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen, $id)
    {
        Dosen::find($id)->delete();
        User::where('nid',$id)->delete();

        return redirect('/dosen-table')->with('delete','Dosen Berhasil Dihapus!');
    }
}
