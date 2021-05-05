<!--
=========================================================
Material Kit - v2.0.7
=========================================================

Product Page: https://www.creative-tim.com/product/material-kit
Copyright 2020 Creative Tim (https://www.creative-tim.com/)

Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Link PLN
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('template/assets/css/material-kit.css?v=2.0.7')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('template/assets/demo/demo.css')}}" rel="stylesheet" />
  @stack('addon-style')
</head>

<body class="index-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100"
    id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="https://demos.creative-tim.com/material-kit/index.html">
         Link PLN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          @if(Auth::user()->user_type_id == 1)
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/view">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/linksAdmin">Link Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/user">User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/kompres">kompres</a>
        </li>
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->username }} <span class="caret"></span>
          </a>
        
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/dashboard/settings">Settings</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
        
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
        @elseif(Auth::user()->user_type_id = 2)
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/view">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/sort">Sort Link</a>
        </li>
       <li class="nav-item">
        <a class="nav-link" href="/dashboard/links">Links</a>
      </li>
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->username }} <span class="caret"></span>
          </a>
        
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/dashboard/settings">Settings</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
        
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
        @elseif(Auth::user()->user_type_id = 3)
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/view">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/sort">Sort Link</a>
        </li>
       <li class="nav-item">
        <a class="nav-link" href="/dashboard/links">Links</a>
      </li>
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->username }} <span class="caret"></span>
          </a>
        
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/dashboard/settings">Settings</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
        
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
        @endif
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter clear-filter purple-filter" data-parallax="true"
    style="background-image: url('./assets/img/bg2.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            @guest
                @else
                <h1>Selamat Datang {{ Auth::user()->username }}</h1>
            @endguest
            <h3>Anda berada di @yield('title')</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div style="margin-top: -180px;" class="main main-raised">
    <!--         carousel  -->
    @yield('content')
  </div>
  <!--  End Modal -->
  <footer class="footer" data-background-color="black">
    <div class="container">
  
      <div class="copyright ">
       <span class="text">Copyright &copy; PLN Pusdiklat - 2021</span>
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="{{asset('template/assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
  <script src="{{asset('template/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('template/assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('template/assets/js/plugins/moment.min.js')}}"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="{{asset('template/assets/js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->

  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('template/assets/js/material-kit.js?v=2.0.7" type="text/javascript')}}"></script>
  @stack('addon-script')
  <script>
    function scrollToDownload() {
      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
  </script>
</body>

</html>