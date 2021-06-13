<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Forgot Password | MAGE6</title>        
  

  <!-- Custom styles for this template-->  
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">     
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">  
  <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
  <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>    
  {{-- <script src="{{ asset('js/daftar.js') }}"></script> --}}
  <script src="{{ asset('js/signup.js') }}"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-173138624-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-173138624-1');
  </script>


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: url('{{ asset('img/background.png') }}'); background-size: cover;">
        <div class="sidebar-brand d-flex align-items-center justify-content-center">
          <div class="sidebar-brand-icon">
            <i class="fas fa-fw fa-tachometer-alt"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Dashboard</div>      
        </div>   
                      
      <hr class="sidebar-divider">
        
      <div class="sidebar-heading">        
          User Controls        
      </div>             

    </ul>    

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          {{-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars" style="color: #760933;"></i>
          </button>

          <!-- Topbar Search -->          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->                               
                        
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>                
              </a>                            
            </li>
            <li class="d-flex align-items-center">
              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf                
                <button type="submit" style="background-color: transparent; border: none;">Logout</button>
              </form>
            </li>

          </ul> --}}

        </nav>
        
        <div class="container">
            @yield('isidashboard')
        </div>
        
      </div>      

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>&copy; MAGE6 2020</span>
          </div>
        </div>
      </footer>      

    </div>    

  </div> 
      

  
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>     --}}
  
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/all.min.js') }}"></script>
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>  
</body>

</html>
