@extends('template/template')
@section('title')
<title>SkuyMedan | {{$title}}</title>
@section('judul')
<h1>{{$title}}</h1>
@endsection
@section('konten')


 <!-- Default box -->
<div class="card">
  <div class="card-body">       

    <form action="{{url('Admin/blogspot/'.$data->id)}}" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf

      <div class="row">
        <div class="col-6">
          <div class="callout callout-info">
            <div class="form-group">
              <h5>Diperbarui</h5>
                <input type="text" name="tanggal" value="{{date('d F Y')}}" class="form-control fw-light" readonly>            
            </div>
          </div>
        </div>

          <div class="col-6">
            <div class="callout callout-info mb-4">
              <div class="form-group">
                <h5>Dibuat Oleh</h5>
                <input type="text" name="dibuat" value="Administrator" class="form-control fw-light" readonly>
              </div>
            </div>
          </div>

          <div class="callout callout-info mb-4">
            <div class="form-group">
              <h5>Judul</h5>
              <input type="text" name="judul" class="form-control fw-light" id="exampleInputEmail1" value="{{$data->judul}}">
            </div>
          </div>

          <div class="callout callout-info mb-4">
            <h5>Konten</h5>
            <textarea class="form-control fw-light" rows="5" id="konten" name="konten">{{$data->konten}}</textarea>
          </div>

          <div class="callout callout-info mb-4">
            <div class="form-group">
              <h5>Alamat</h5>
              <input type="text" name="alamat" class="form-control fw-light" id="exampleInputEmail1" value="{{$data->alamat}}">
            </div>
          </div>

          <div class="callout callout-info">
            <h5>Gambar</h5>
              <div class="row">
                <div class="col-sm-4">
                  <a target="_blank" href="{{url('blogspot/'.$data->gambar)}}">
                    <img src="{{url('blogspot/'.$data->gambar)}}" class="image-resize" id="imgView" height="200" width="300">
                 </a>
                </div>
                <div class="col-sm-8">
                  <div class="custom-file" class="form-control">
                    <input type="file" class="custom-file-input" id="image" name="gambar" value="{{$data->gambar}}">
                  </div>
                </div>
              </div>
          </div>

  
            <div class="card-body">
              <input type="submit" name="ubah" class="btn btn-outline-success float-sm-right" value="Ubah">
              <a class="btn btn-outline-danger float-sm-right" href="{{url('/Admin/blogspot')}}">  
                Batal
              </a> 
            </div>

    </form>
  </div>
</div>

@endsection


