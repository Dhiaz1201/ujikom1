<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjam;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjam = Peminjam::all();
        $response = [
            'success'=>true,
            'data'=>$peminjam,
            'massage'=>'berhasil'
        
        ];
        return view('backend.peminjam.index',compact('peminjam'));
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
       $peminjam = new Peminjam;
       $peminjam->peminjam_kode = $request->peminjam_kode;
       $peminjam->peminjam_nama = $request->peminjam_nama;
       $peminjam->peminjam_alamat = $request->peminjam_alamat;
       $peminjam->peminjam_telp = $request->peminjam_telp;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = public_path() . '/assets/img/artikel/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $peminjam->peminjam_foto = $filename;
        }
       $peminjam->save();
         $response = [
                'success' =>true,
                'data' => $peminjam,
                'massage' =>'berhasil ditambahkan.'
            ];
            //6.tampilkan berhasil
            return response() ->json($response,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $peminjam = Peminjam::findOrFail($id);
        if (!$peminjam) {
            $response = [
                'success' =>false,
                'data' => 'gagal menampilkan',
                'massage' =>'siswa tidak di temukan'
            ];
            return response()->json($response,404);
        }
        $response = [
                'success' =>true,
                'data' => $peminjam,
                'massage' =>'berhasil menampilkan.'
            ];
            return response()->json($response,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $peminjam = User::findOrFail($id);
        $response = [
            'success'=>true,
            'data'=>$peminjam,
            'massage'=>'berhasil'
        
        ];
        return response()->json($response,200);
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
       $peminjam = Peminjam::findOrFail($id);
       $peminjam->peminjam_kode = $request->peminjam_kode;
       $peminjam->peminjam_nama = $request->peminjam_nama;
       $peminjam->peminjam_alamat = $request->peminjam_alamat;
       $peminjam->peminjam_telp = $request->peminjam_telp;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = public_path() . '/assets/img/artikel/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $peminjam->peminjam_foto = $filename;
        }
       $peminjam->save();
        $response = [
                'success' =>true,
                'data' => $peminjaman,
                'massage' =>'berhasil merubah.'
            ];
            return response()->json($response,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $peminjam =Peminjam::findOrFail($id);
           $peminjam->delete();
             $response = [
                'success' =>true,
                'data' => $peminjam,
                'massage' =>'berhasil. menghapus'
            ];
            return response()->json($response,200);
    }
}
