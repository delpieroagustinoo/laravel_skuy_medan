<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogspotModel;
use App\KomentarModel;
use App\ReplyModel;
use App\TestimoniModel;
use Illuminate\Support\Facades\DB;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BlogspotModel::all();
        $testimoni = TestimoniModel::all();
        $judul = 'SkuyMedan | Home';
        return view('frontend.mainpage',['judul'=>$judul, 'data'=>$data, 'data2'=>$data, 'data3'=>$data, 'testimoni'=>$testimoni, 'testimoni2'=>$testimoni]);
    }


    public function showdetail($id)
    {
        
        $blogspot = BlogspotModel::find($id);
        $judul = 'SkuyMedan | Blog';
        $komentar = KomentarModel::where('id_blogspot',$id)->get();
        $reply = ReplyModel::all();
        $count = DB::table('tb_komentar')
             ->select(DB::raw('count(*) as count'))
             ->where('id_blogspot', '=', $id)
             ->first();
        return view('frontend.blog',['data'=>$blogspot, 'judul'=>$judul, 'komentar'=>$komentar, 'reply'=>$reply, 'count'=>$count]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function tambahkomen(Request $request)
    {
        KomentarModel::create($request->all());


        return back();
    }

    public function tambahtestimoni(Request $request)
    {
        TestimoniModel::create($request->all());


        return back();
    }

    public function show($id)
    {
        $data = KomentarModel::find($id);
        return view('frontend.tambahreply',['data'=>$data]);
    }

         public function tambahreplykomen(Request $request)
    {
        ReplyModel::create($request->all());


        return back();
    }

}
