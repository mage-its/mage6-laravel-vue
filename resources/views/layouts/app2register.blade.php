<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset ('css/login-register.css') }}" />
    <link rel="shortcut icon" href="{{ asset ('img/logo.png') }}" type="image/x-icon">
    {{-- <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">     --}}
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-173138624-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-173138624-1');
    </script>

    
    <title>Register | MAGE6</title>
  </head>
  <body>
    <div id="particles"></div>

    <!-- background -->
    <div class="background gradient-1">
      <nav class="navbar navbar-expand-sm c-nav">
        <a class="navbar-brand" href="/"><img src="img/logo.png" class="img-fluid" alt="" srcset=""><span class="t--airstrike h4">MAGE 6</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Category              
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="border: none">
                <a class="dropdown-item text-center" href="/olimpiade">Olimpiade</a>
                <a class="dropdown-item text-center" href="/devcom">Devcom</a>                
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link text-center" href="{{ route('login') }}">Login</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link text-center" href="{{ route('register') }}">Register</a>
            </li>                       
          </ul>          
        </div>
      </nav>
    
      <!-- form -->
    <div class="container">      
        @yield('konten')
    </div>
      <!-- akhir form -->

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/particles.min.js"></script>
    <script src="js/particle-config.js"></script>
  </body>
</html>
