<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogspotModel;

class BlogspotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BlogspotModel::all();
        $judul = 'Dashboard';
        return view('blogspot.index',['title'=>$judul, 'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = BlogspotModel::all();
        $judul = 'Tambah Data Wisata';
        return view('blogspot.tambah',['title'=>$judul, 'data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nm = $request->gambar;
        $nmlok = $request->gambarlokasi;
        $namaFile = "Wisata-".rand(100,999).".".$nm->getClientOriginalExtension();

        $dtUpload = new BlogspotModel;
        $dtUpload -> judul = $request -> judul;
        $dtUpload -> konten = $request -> konten;
        $dtUpload -> tanggal = $request -> tanggal;
        $dtUpload -> tanggalperbarui = $request -> tanggal;
        $dtUpload -> dibuat = $request -> dibuat;
        $dtUpload -> alamat = $request -> alamat;
        $dtUpload -> gambar = $namaFile;

        $nm->move(public_path().'/blogspot', $namaFile);
        $dtUpload->save();

        return redirect('Admin/blogspot')->with('pesan','data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blogspot = BlogspotModel::find($id);
        return view('blogspot.lihat',['data'=>$blogspot]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = BlogspotModel::find($id);
        $judul = "Ubah Data Wisata";
        return view('blogspot/ubah',['title'=>$judul,'data'=>$data]);
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
        $ubah = BlogspotModel::where('id',$id)->first();
        $awal = $ubah->gambar;

        $databaru = $request -> gambar;   

        $data = [
            'judul' => $request['judul'],
            'konten' => $request['konten'],
            'tanggalperbarui' => $request['tanggal'],
            'dibuat' => $request['dibuat'],
            'alamat' => $request['alamat'],
            'gambar' => $awal,
        ];
        if($databaru != null){
            $request->gambar->move(public_path().'/blogspot',$awal);
        }

        $ubah->update($data);
        return redirect('Admin/blogspot');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = BlogspotModel::findorfail($id);

        $file = public_path('blogspot/').$hapus->gambar;
        if(file_exists($file)){
            @unlink($file);
        }

        $hapus->delete();
        return back();
    }
}
