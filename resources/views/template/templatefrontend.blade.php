<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- MY CSS -->
    <link rel="stylesheet" href="{{url('assets/css/styls.css')}}">
    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="{{url('template/css/style2.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet"> 

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 



    <style>
    *{
      font-family: 'Outfit', sans-serif;
    }

    .card-header2{
      background: linear-gradient(to right, #012E6D, #0876B8);
      height: 30px !important;
      width: 160px;
    }

    body{
      background-color: #fafafa;
    }

    :-moz-any(#content,#appcontent) browser{
       margin-right:-14px!important;
       overflow-y:scroll;
       margin-bottom:-14px!important;
       overflow-x:scroll;
      }

      .bgauth{
        background-image: url('heroimage.jpg');
        background-position: left;
        object-fit: cover;
      }

      .bg{
        background-image: url('heroimage.jpg');
        margin-top: -100px;
        height: 915px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        filter: brightness(65%);
      }

      .banner-text{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 5;
        width: 45%;
        padding: 40px 0;
        text-align: center;
        color: #fff;
      }

      .bg-dark{
        transition: .5s ease;
        background-color: transparent !important;
      }

      .bg-dark.scrolled {
        background-color: #212121 !important;;
      }

      .navbar-brand:hover{
        opacity: 70%;
        color: #B2B8A3;
        transition: 0.8s ease;
      }

      .btn-home{
        border: 1px solid #B2B8A3;
        background: none;
        padding: 10px 20px;
        font-size: 20px;
        font-family: "montserrat";
        cursor: pointer;
        margin: 10px;
        color: #B2B8A3;
        transition: 0.8s;
      }
      .btn-home:hover{
        color: #fff;
        background-color: #B2B8A3;
        border: none;
      }

      .footer{
        background: rgb(0, 91, 143);
      }

      .max.title{
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
      }

      .image-resize{
        object-fit: cover;
        object-position: center center;
      }

      img.image-slider{
        height: 500px !important;
        width: 80% !important;
        filter: brightness(60%);
      }

      .card-slider{
        width: 50% !important;
      }

    </style>
    
    @yield('judul')
  </head>



  <body>


<!-- Awal Navbar -->

@yield('navbar')

<!-- Akhir Navbar -->



<!-- Awal Home -->

  @yield('home')
<!-- Akhir Home -->


<!-- Awal Blog -->
@yield('blog')
<!-- Akhir Blog -->


<!-- Awal Gallery -->

@yield('gallery')

<!-- Akhir Gallery -->

<!-- Awal Info Lokasi dan Gambar -->

<!-- Awal Testimoni -->

@yield('testimoni')

<!-- Akhir Testimoni -->

<!-- Awal Info Lokasi dan Gambar -->

@yield('info')

<!-- Akhir Info Lokasi dan Gambar -->

<!-- Awal Footer -->

@yield('footer')

<!-- Akhir Footer -->

















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <script src="{{url('template/js/jquery.min.js')}}"></script>
    <script src="{{url('template/js/popper.js')}}"></script>
    <script src="{{url('template/js/bootstrap.min.js')}}"></script>
    <script src="{{url('template/js/main.js')}}"></script>
    <script>
      $(window).scroll(function(){
      $('nav').toggleClass('scrolled', $(this).scrollTop() > 600);
      });
    </script>

  </body>

</html>