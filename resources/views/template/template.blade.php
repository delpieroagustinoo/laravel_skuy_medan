<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{url('css/dashboard.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Outfit', sans-serif;
        }
        th {
          position: -webkit-sticky;
          position: sticky;
          top: 0;
          z-index: 2;
        }
        .image-resize{
        object-fit: cover;
        object-position: center center;
        }
        .scroll{
          height: 480px;
          overflow: scroll;
          scrollbar-width: none;
        }
        .scroll::-webkit-scrollbar{
            width: 0;
            height: 0;
        }
        .max.title {
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">SkuyMedan</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <form action="{{ url('logout') }}" method="POST">
                @csrf

                <button type="submit" class="nav-item text-nowrap mt-2 border-0 text-light bg-transparent"><strong>Sign Out</strong></button>

            </form>
        </ul>
    </header>
    <!-- End Of Header -->

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link text-light fs-5 fw-light" href="{{url('Admin/blogspot')}}">
                                <i class="bi bi-person-circle"></i> {{ auth()->user()->name }}
                            </a>
                        </li>

                        <li><hr class="dropdown-divider text-light"></li>
                        <li class="nav-item">
                            <a class="nav-link text-light fw-light" href="{{url('Admin/blogspot')}}">
                                <i class="bi bi-camera2"></i> Dashboard
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-light fw-light" href="{{url('register')}}">
                                <i class="bi bi-person-lines-fill"></i> Register Admin
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                    @yield('judul')

                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2"></div>
                    </div>
                </div>

                @yield('konten')

            </main>
        </div>
    </div>

@yield('modal')

    <!-- jQuery -->
    <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
            integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>

    
    <script>

    ClassicEditor
        .create( document.querySelector( '#konten' ) )
        .catch( error => {
            console.error( error );
        } );


  $('.custom-file-input').on('change',function(){
    let filename = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(filename);
  });


  $("#image").change(function(event) {  
      fadeInAdd();
      getURL(this);    
    });

    $("#image").on('click',function(event){
      fadeInAdd();
    });

    function getURL(input) {    
      if (input.files && input.files[0]) {   
        var reader = new FileReader();
        var filename = $("#image").val();
        filename = filename.substring(filename.lastIndexOf('\\')+1);
        reader.onload = function(e) {
          debugger;      
          $('#imgView').attr('src', e.target.result);
          $('#imgView').hide();
          $('#imgView').fadeIn(500);      
          $('.custom-file-label').text(filename);             
        }
        reader.readAsDataURL(input.files[0]);    
      }
      $(".alert").removeClass("loadAnimate").hide();
    }

    function fadeInAdd(){
      fadeInAlert();  
    }
    function fadeInAlert(text){
      $(".alert").text(text).addClass("loadAnimate");  
    }

    CKEDITOR.replace('konten',{
      uiColor:  '#DAA520'
    });

    </script>
    @yield('js')

    <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
</body>

</html>