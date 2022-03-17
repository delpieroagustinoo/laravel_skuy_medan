@dextends('template/templatefrontend')
@section('judul')
<title>{{$judul}}</title>
@endsection


@section('navbar')

<nav class="navbar navbar-expand-lg navbar-dark fixed-top sticky-top" style="background-color: #212121;">
  <div class="container-md">
    <a class="navbar-brand" href="../../../"><strong style="font-family: 'Permanent Marker', cursive;; font-size: 30px;">SkuyMedan</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="../../../#home">Home</a>
        <a class="nav-link" href="../../../#blog">Explore</a>
        <a class="nav-link" href="../../../#gallery">Gallery</a>
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

@section('blog')
<div id="blog" class="container-md" style="max-width: 1000px; ">
  
  <div class="text-center mt-5">

    <div class="container mt-4">
      <ul class="nav justify-content-center pb-3 mb-3">
        <li class="nav-item px-2">
            <i class="fas fa-calendar"> <span class="fw-light fst-italic">{{$data->tanggal}}</span></i>
        </li>
        <li class="nav-item px-2">
            <i class="fas fa-user-shield"> <span class="fw-light fst-italic">{{$data->dibuat}}</span></i>
        </li>
      </ul>
    </div>

    <div class="container mt-3">
      <h1 class="text-center"><strong>{{$data->judul}}</strong></h1>
      <img class="mt-3" src="{{url('blogspot/'.$data->gambar)}}" alt="Gambar Blog" height="300px">
      <div class="fs-6 fw-light mt-4" align="justify" style="line-height: 27px;">{!! $data->konten !!}</div>
    </div>


<div id="#" class="container-lg">
  
  <div class="text-center" style="margin-top: 100px;">
  <h1 ><strong>Temukan Wisata</strong></h1>
  
  <div class="row justify-content-center mt-4">

    <div class="col-lg">
      <iframe src="{{$data->alamat}}" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

  </div>

</div>

</div>


<!-- Awal Komentar -->
    <div class="container" style="margin-top: 75px;">
     
        <div class="text-start row bg-white shadow rounded p-4">
          <h3><strong>Comments ({{$count->count}})</strong></h3>

           @foreach($komentar as $komentar)

          <div class="card border-0 shadow-sm mt-5">
            <div class="row card-header">
              <h5 class="mt-2 fs-6">{{$komentar->nama}}</h5>
            </div>
            <div class="card-body">
              <blockquote class="blockquote fs-6 fw-light mb-0">
                <small>{{$komentar -> komentar}}</small>
                <footer class="blockquote-footer mt-2"><small>{{$komentar->tanggal}}</small></footer>
              </blockquote>
            </div>
          </div>
          
          <?php
          $count = $komentar->id;
          ?>

          <button class="tambahreply btn btn-outline-primary btn-sm col-lg-1 mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{$komentar->id}}" >Reply</button>

          @foreach($reply as $r)
          @if($komentar->id == $r->id_komentar)

          <div class="row ms-3">

            <div class="card border-0 shadow-sm mt-2">

              <div class="row card-header">
                <h5 class="mt-2 fs-6">{{$r->nama}}</h5>
              </div>

              <div class="card-body">
                <blockquote class="blockquote fs-6 fw-light mb-0">
                  <small>{{$r -> komentar}}</small>
                  <footer class="blockquote-footer mt-2"><small>{{$r->tanggal}}</small></footer>
                </blockquote>
              </div>

            </div>
          </div>

           @endif
          @endforeach
        
      @endforeach
         

    </div>
    </div>
        
<!-- Akhir Komentar -->


    <div class="container mt-5">
      
        <div class="bg-white shadow rounded p-4">
          <h3 class="text-start mb-5"><strong>Leave a Reply</strong></h3>
          <form action="{{url('frontend/tambahkomentar')}}" method="POST">
            @csrf

            <input type="hidden" name="tanggal" value="{{date('d F Y')}}">
            <input type="hidden" name="id_blogspot" value="{{$data->id}}">
            <div class="row text-start">
              <div class="col-lg-6">
                <input type="name" class="form-control" id="name" name="nama" placeholder="Name *" required>
              </div>
              <div class="col-lg-6 mb-4">
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email *" required>
              </div>
              <div class="col-lg mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" name="komentar" placeholder="Comment *" rows="3" required></textarea>
              </div>
            </div>
            <button class="btn btn-outline-primary btn-sm" type="submit">Kirim Komentar</button>

          </form>
        </div>

    </div>

  </div>
</div>
@endsection

@section('footer')

  <div class="container-fluid" style="background-color: #212121">
  <footer class="mt-5 p-5">
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">



      <div class="modal-form">
        

      </div>
    </div>
  </div>
</div>

 <!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>


<script>
  

  $('.tambahreply').on('click',function(){

    let id = $(this).data('id')
    $.ajax({
      url:`/frontend/blogspot/${id}/tambah`,
      method:"GET",
      success: function(data){
        $('#exampleModal').find('.modal-form').html(data)
      },
      error:function(error){
        console.log(error)
      }
    })
  })



</script>

@endsection

