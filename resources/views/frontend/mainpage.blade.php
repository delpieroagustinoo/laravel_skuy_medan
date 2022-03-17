@extends('template/templatefrontend')

@section('judul')
<title>{{$judul}}</title>
@endsection


@section('navbar')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top sticky-top">
  <div class="container-md">
    <a class="navbar-brand" href=""><strong style="font-family: 'Permanent Marker', cursive;; font-size: 30px;">SkuyMedan</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="#home">Home</a>
        <a class="nav-link" href="#blog">Explore</a>
        <a class="nav-link" href="#gallery">Gallery</a>
      </div>

      <ul class="navbar-nav ms-auto">
      
      @auth

      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ url('Admin/blogspot') }}"><i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>

            <form action="{{ url('logout') }}" method="POST">
              @csrf
              
              <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>

            </form>

          </ul>
        </li>

      @else

      <li class="nav-item">
        <a class="nav-link" href="{{url('login')}}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
      </li>
      
      @endauth
      
      </ul>
      
    </div>
  </div>
</nav>

@endsection


@section('home')
<div id="home" class="bg"></div>
<div class="banner-text">
  <p class="fst-italic fw-normal">
    <span class="fw-bold fs-2">Welcome to Medan,</span>   kota dengan sejuta kesan. Beragam suku dan budaya hadir di Medan. Begitu banyak hal luar biasa yang bisa di temukan di salah satu kota Metropolitan di Indonesia. Ibukota Sumatera Utara ini memiliki segudang kekayaan yang tersimpan. Yuk, kenali Medan lebih lanjut!
  </p>
  <a href="#blog">
    <button type="button" class="btn btn-outline-warning">Kuy Explore!</button>
  </a>
</div>
  @endsection

  @section('blog')
  <div id="blog" class="container-md">
  
  <div class="text-center" style="margin-top: 50px;">
  <h1><strong>Explore</strong></h1>
  <div class="row justify-content-center">



    @foreach($data as $data)
    <div class="col-lg-4 mt-5">
      <a href="{{url('frontend/blogspot/'.$data->id.'/detail')}}" class="text-decoration-none link-dark">
      <img src="{{url('blogspot/'.$data->gambar)}}" class="image-resize" height="250px" width="300px">
      <h6 class="mt-4"><strong style="font-family: 'Lexend Deca', sans-serif; font-size:18px; letter-spacing:1px " >{{$data->judul}}</strong></h6>
      <p><small class="fw-lighter">{{$data->tanggalperbarui}} • {{$data->dibuat}}</small></p>
      </a>
    </div>
    @endforeach

  </div>
</div>

</div>
@endsection



@section('gallery')
<div id="gallery" class="container-lg">
  
  <div class="text-center" style="margin-top: 100px;">
  <h1><strong>Gallery</strong></h1>
  
  <div id="carouselExampleFade" class="carousel slide carousel-fade mt-5" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <?php 
      $i = 0;
      foreach ($data2 as $data){
        $actives = '';
        if($i == 0){
          $actives = 'active';
        }

      ?>
      <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="<?= $i; ?>" class="<?= $actives; ?>" aria-current="true" aria-label="Slide 1"></button>
      <?php $i++; } ?>
    </div>
    <div class="carousel-inner">
      @foreach($data2 as $data)
      <div class="carousel-item {{$data['id']==1?'active':''}}">
        <img src="{{url('blogspot/'.$data->gambar)}}" class="image-slider image-resize" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="text-white">{{$data->judul}}</h5>
        </div>
      </div>
      @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

</div>

</div>
@endsection


@section('testimoni')
<div id="testimoni" class="container-md">
  <div class="text-center" style="margin-top: 100px;">
    <h1><strong>Apa Kata Mereka?</strong></h1>
    <div class="row justify-content-center">
      
      <div class="col-lg-6">
        <div class="mt-5">
          <div class="bg-white shadow rounded p-4">
            <h3 class="text-start mb-5"><strong>Penilaianmu kepada kami</strong></h3>
            <form action="{{url('frontend/tambahtestimoni')}}" method="POST">
            @csrf

              <input type="hidden" name="tanggal" value="{{date('d F Y')}}">
              <div class="row text-start">
                <div class="col-lg-6 mb-4">
                  <input type="nama" class="form-control" id="nama" name="nama" placeholder="Nama *" minlength="4" maxlength="8" required>
                </div>
                <div class="col-lg-12 mb-3">
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="testimoni" placeholder="Berikan penilaianmu *" rows="3" maxlength="200" required></textarea>
                </div>
              </div>
                <button class="btn btn-outline-primary btn-sm p-2 d-grid gap-2 d-md-block" type="submit">Kirim</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mt-5">
     
      @foreach($testimoni as $testimoni)
      <div class="row mb-2">

            <div class="card shadow-sm text-start">

              <div class="row card-header2 shadow-sm">
                <h5 class="fw-bold text-white fs-6 mt-1">{{$testimoni->nama}}</h5>
              </div>

              <div class="card-body">
                <blockquote class="blockquote fs-6 fw-light mb-0">
                  <p>{{$testimoni -> testimoni}}</p>
                </blockquote>
              </div>

            </div>
          </div>
      @endforeach

      </div>
      
      
    </div>
  </div>
</div> 

@endsection


@section('footer')

  <div class="container-fluid" style="background-color: #212121;">
  <footer class="p-5" style="margin-top: 200px">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item px-2">
        <a href="#">
          <i class="fab fa-instagram text-white"></i>
        </a>
      </li>
      <li class="nav-item px-2">
        <a href="#">
          <i class="fab fa-twitter text-white"></i>
        </a>
      </li>
      <li class="nav-item px-2">
        <a href="#">
          <i class="fab fa-facebook text-white"></i>
        </a>
      </li>
      <li class="nav-item px-2">
        <a href="#">
          <i class="fab fa-linkedin text-white"></i>
        </a>
      </li>
      <li class="nav-item px-2">
        <a href="#">
          <i class="fab fa-pinterest text-white"></i>
        </a>
      </li>
      <li class="nav-item px-2">
        <a href="#">
          <i class="fab fa-github text-white"></i>
        </a>
      </li>
    </ul>
    <p class="text-center text-muted">&copy; 2021 Team 1 </p>
  </footer>
</div>

@endsection