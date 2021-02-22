<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>@yield('title', 'CLeanly | Dashboard')</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <style>
    .select2{
 
        width: 100% !important;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini" onload="loaded()">
    <div id="cleanly">
      
        
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          
          <!-- Right navbar links -->
          <ul class="navbar-nav ml-auto">
              
          </ul>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
                  
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      
                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
          </ul>
      </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ url('/admin') }}" class="brand-link">
        <img src="images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Cleanly</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link">
                  <i class="fa fa-credit-card" aria-hidden="true"></i>
                <p>
                  Bookings
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                      <i class="fa fa-spinner" aria-hidden="true"></i>
                    <p>Upcoming Bookings</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                      <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <p>Completed</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="fa fa-users" aria-hidden="true"></i>
                <p>
                  Users
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('service') }}" class="nav-link">
                  <i class="fa fa-puzzle-piece" aria-hidden="true"></i>
                <p>
                  Services
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/rate') }}" class="nav-link">
                  <i class="fa fa-money" aria-hidden="true"></i>
                <p>
                  Rates by House Size / Baths
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="fa fa-percent" aria-hidden="true"></i>
                <p>
                  Setup Discounts
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/timing') }}" class="nav-link">
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                <p>
                  Setup Usual Timings
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('timing-override') }}" class="nav-link">
                  <i class="fa fa-user-times" aria-hidden="true"></i>
                <p>
                  Timing Manual Overrides
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('cleaning') }}" class="nav-link">
                  <i class="fa fa-list-ol" aria-hidden="true"></i>
                <p>
                  No. of Cleaning at once
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
      <div class="loader">
          <div class="preloader">
              <div class="spinner-layer pl-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
          <p>Please wait...</p>
      </div>
  </div>
  <!-- #END# Page Loader -->
  <!-- Overlay For Sidebars -->
  <div class="overlay"></div>
  <!-- #END# Overlay For Sidebars -->
    <div class="content-wrapper">
      @yield('content')
    </div>
    @include('admin.include.footer')

    </div>
    <script type="text/javascript">
      var base_url = "{{ url('/').'/' }}";
    </script>

    <script type="text/javascript">

      function loaded(){
            var segment3 = '{{ Request::segment(1) }}';
            var current_url = base_url + segment3;
            $('a[href="' + current_url + '"]').parents('.ml-menu').siblings('a').addClass('toggled');
            $('a[href="' + current_url + '"]').parents('.ml-menu').css('display','block');
      }
    </script>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })
</script>
@stack('script')
</body>
</html>
