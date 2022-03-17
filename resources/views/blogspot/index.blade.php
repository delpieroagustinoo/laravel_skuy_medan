@extends('template/template')
@section('title')
<title>SkuyMedan | {{$title}}</title>
@section('judul')
<h1>{{$title}}</h1>
@endsection
@section('subjudul')
<li class="breadcrumb-item active">{{$title}}</li>
@endsection
@section('konten')

@if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success' )}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

<div class="card border-light">
              <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                    <i class="fa fa-plus">
                        Tambah Data
                    </i>
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="scroll">
                <table id="example1" class="table">
                  <thead class="table-dark text-center">
                  <tr>
                    <th width="5%">Nomor</th>
                    <th width="30%">Judul</th>
                    <th width="10%">Gambar</th>
                    <th width="15%">Dibuat Pada</th>
                    <th width="15%">Diperbarui Pada</th>
                    <th width="35%">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $data)
                        <tr class="fw-light">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->judul}}</td>
                            <td>
                                <a href="{{url('blogspot/'.$data->gambar)}}" target="_blank">
                                    <img class="shadow bg-body rounded" src="{{url('blogspot/'.$data->gambar)}}" height="70" width="125">
                                </a>
                            </td>
                            <td>{{$data -> tanggal}}</td>
                            <td>{{$data -> tanggalperbarui}}</td>
                            <td>
                                <center>
                                <form method="post" action="{{url('Admin/blogspot/'.$data->id)}}">
                                @method('delete')
                                @csrf
                                    <a href="#" data-toggle="modal" data-target="#modallihat" class="btn btn-outline-primary see-detail"
                                    title="Detail" data-id="{{$data->id}}" data-gambar="{{$data->gambar}}" data-judul="{{$data->judul}}"
                                    data-konten="{{$data->konten}}" data-tanggal="{{$data->tanggal}}" data-dibuat="{{$data->dibuat}}"
                                    data-tanggalperbarui="{{$data->tanggalperbarui}}" >
                                    <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{url('Admin/blogspot/'.$data->id.'/edit')}}" 
                                    class="btn btn-sm btn-outline-warning btn-edit">
                                    Ubah
                                    </a>
                                    <button class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Yakin ingin menghapus data?')"> Hapus</button>
                                    </form>
                                </center>
                                </td>
                        </tr>
                    @endforeach 
                  </tfoot>
                </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            


@endsection

@section('modal')

<!-- modal tambah -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Wisata</h5>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('Admin/blogspot/tambah')}}" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-6">
              <div class="callout callout-info">
                <div class="form-group">
                  <h6>Tanggal</h6>
                  <input type="text" name="tanggal" value="{{date('d F Y')}}" class="form-control" readonly>
                </div>
              </div>
            </div>

              <div class="col-6">
                <div class="callout callout-info">
                  <div class="form-group">
                    <h6>Dibuat Oleh</h6>
                    <input type="text" name="dibuat" value="Administrator" class="form-control" readonly>
                  </div>
                </div>
              </div>

              <div class="callout callout-info">
                <div class="form-group">
                  <h6>Judul</h6>
                  <input type="text" name="judul" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Judul">
                </div>
              </div>

              <div class="callout callout-info">
                <div class="form-group">
                  <h6>Alamat</h6>
                  <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Alamat">
                </div>
              </div>
          
              <div class="callout callout-info">
                <div class="form-group">
                  <h6>Konten</h6>
                  <textarea class="form-control"  rows="5" id="konten" name="konten"></textarea>
                </div>           
              </div>
                    
              <div class="form-group">
                <h6>Gambar</h6>
                <div class="row align-center">
                  <div class="col">
                    <img src="{{url('placeholder.png')}}" class="img-thumbnail" id="imgView" height="180" width="180">
                  </div>
                    <div class="col-10">
                      <div class="custom-file" class="form-control">
                        <input type="file" class="custom-file-input" id="image" name="gambar">
                      </div>
                    </div>
                </div>
              </div>

            </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
      </form>
      
    </div>
  </div>
</div>


<!-- modal lihat -->
<div class="modal fade bd-example-modal-lg" id="modallihat" tabindex="-1" role="dialog" aria-labelledby="modallihat" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

    <div class="modal-isi">


    </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>



@endsection

@section('js')

<script>
  

  $('.see-detail').on('click',function(){

    let id = $(this).data('id')
    $.ajax({
      url:`/Admin/blogspot/${id}/lihat`,
      method:"GET",
      success: function(data){
        $('#modallihat').find('.modal-isi').html(data)
      },
      error:function(error){
        console.log(error)
      }
    })
  })



</script>

@endsection

