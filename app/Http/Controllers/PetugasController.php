<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petugas;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = Petugas::all();
        $response = [
            'success'=>true,
            'data'=>$petugas,
            'massage'=>'berhasil'
        
        ];
        return view('backend.petugas.index',compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('backend.petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'petugas_kode' => 'required|unique:petugas',
            'petugas_nama' => 'required'
        ]);
           $petugas = new Petugas;
       $petugas->petugas_kode = $request->petugas_kode;
       $petugas->petugas_nama = $request->petugas_nama;
       $petugas->save();
         $response = [
                'success' =>true,
                'data' => $petugas,
                'massage' =>'berhasil ditambahkan.'
            ];
            //6.tampilkan berhasil
            return redirect()->route('petugas.index');
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
        $petugas = Petugas::findOrFail($id);
        $response = [
            'success'=>true,
            'data'=>$petugas,
            'massage'=>'berhasil'
        
        ];
        return view('backend.petugas.edit',compact('petugas'));
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
          $request->validate([
            'petugas_kode' => 'required|unique:petugas',
            'petugas_nama' => 'required'
        ]);
         $petugas = Petugas::findOrFail($id);
       $petugas->petugas_kode = $request->petugas_kode;
       $petugas->petugas_nama = $request->petugas_nama;
       $petugas->save();
        $response = [
                'success' =>true,
                'data' => $petugas,
                'massage' =>'berhasil merubah.'
            ];
           return redirect()->route('petugas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $petugas =Petugas::findOrFail($id);
           $petugas->delete();
             $response = [
                'success' =>true,
                'data' => $petugas,
                'massage' =>'berhasil. menghapus'
            ];
            return redirect()->route('petugas.index');
    }
}
