@extends('template/template')
@section('title')
<title>SkuyMedan | {{$title}}</title>
@section('judul')
<h1> {{$title}}</h1>
@endsection
@section('konten')


 <!-- Default box -->
      <div class="card">
        <div class="card-body">
          

        <form action="{{url('Admin/blogspot/tambah')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="callout callout-info">
                        <h5>Tanggal</h5>
                        <input type="text" name="tanggal" value="{{date('d F Y')}}" class="form-control" readonly>
                    </div>
                </div>
                    <div class="col-6">
                        <div class="callout callout-info">
                            <h5>Dibuat Oleh</h5>
                            <input type="text" name="dibuat" value="Administrator" class="form-control" readonly>
                        </div>
                    </div>
            </div>

            <div class="callout callout-info">
                <div class="form-group">
                    <h5>Judul</h5>
                    <input type="text" name="judul" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Judul">
                </div>
            </div>

            <div class="callout callout-info">
                 <h5>Konten</h5>
                 <textarea class="form-control" rows="5" id="konten" name="konten"></textarea>
              </div>

            <div class="callout callout-info">  
                <div class="form-group">
                    <h5>Gambar</h5>
                        <div class="row">
                            <div class="col-5">
                                <img src="{{url('placeholder.png')}}" id="imgView" height="280" width="400">
                            </div>
                            <div class="col-7">
                                <div class="custom-file" class="form-control">
                                    <input type="file" class="custom-file-input" id="image" name="gambar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- /.card-body -->
          <input type="submit" name="tambah" class="btn btn-info float-sm-right" value="tambah">
          <a class="btn btn-danger float-sm-right" href="{{url('/Admin/blogspot')}}">  
             <i class="far fa-times-circle"></i>Batal
            </a>        
        
        </form>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

@endsection

