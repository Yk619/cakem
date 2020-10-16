<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'CAKEAPP') }}</title>
    

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('assets/css')}}/bootstrap.min.css">
     <link rel="stylesheet" href="{{asset('assets/css')}}/bootstrap.min.profile.css">
    <link rel="stylesheet" href="{{asset('assets/font-awesome')}}/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://localhost/test/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('assets/css')}}/AdminLTE.min.css">
    <link rel="stylesheet" href="{{asset('assets/css')}}/skins/_all-skins.min.css">
     <link rel="stylesheet" href="{{asset('assets/css')}}/skins/skin-style.css">
    <link rel="stylesheet" href="{{asset('assets/css')}}//morris.css">
    <link rel="stylesheet" href="{{asset('assets/css')}}/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{asset('assets/css')}}/daterangepicker.css">
    <link rel="stylesheet" href="{{asset('assets/css')}}/jquery-jvectormap.css">
    <link href="{{asset('assets/plugins')}}/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css')}}/Chart.css">
    <link rel="stylesheet" href="{{asset('assets/css')}}/Chart.min.css">

    <link rel="stylesheet" href="{{asset('assets/css')}}/select2.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script src="{{asset('assets/js')}}/Chart.bundle.js"></script>
    <script src="{{asset('assets/js')}}/select2.min.js"></script>
    <script src="{{asset('assets/js')}}/Chart.bundle.min.js"></script>
    <script src="{{asset('assets/js')}}/Chart.js"></script>
    <script src="{{asset('assets/js')}}/Chart.min.js"></script>
    <script src="{{asset('assets/js')}}/jquery.min.js"></script>

    <script src="{{asset('assets/js')}}/jquery-ui.min.js"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.7.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.7.0/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.2.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.2.0/mapbox-gl-geocoder.css' type='text/css' />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.css' type='text/css' />
    <style>
    body { margin:0; padding:0; }
   #map {
          position: absolute;
          top: 0;
          bottom: 50;
          width: 97%;
          height: 97%;
        }
    </style>
     <style>
    .custom { min-width: 100px;}
    </style>
    <style>
    .form-group >input { border-radius: 8px;}
    .required {
      color: red;
      width: 2px;
     height: 2px;
}
    </style>
    <!--<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>-->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper"> 
  <header class="main-header">
    <!-- Logo -->
    <a href="{{route('dashboard')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">CAKE APP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"> CAKE APP</span>

    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel pull-left">
        <div class="pull-left image">
        <!--  <img src="{{asset('assets/img')}}/user2-160x160.jpg" class="img-circle" alt="User Image">-->
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->fname}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>  
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <!--<div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span> 
        </div>-->
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <!--<li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li> -->

        <?php $uri = Route::current()->getName();
        $uriPart = explode('.', $uri); ?>

        <li class="{{ ($uriPart[0] == 'dashboard') ? 'active' : '' }}">
          <a href="{{route('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li class="{{ ($uriPart[0] == 'cakes') ? 'active' : '' }}">
          <a href="{{route('cakes')}}">
            <i class="fa fa-file-text-o"></i> <span>Cake Management</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li class="{{ ($uriPart[0] == 'orders') ? 'active' : '' }}">
          <a href="{{route('orders')}}">
            <i class="fa fa-file-text-o"></i> <span>Orders</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li>
          <a href="{{route('logout')}}">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <style>
#geocoder-container > div {
min-width:50%;
margin-left:25%;
}
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    @yield('content')

    </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b></b> 
    </div>
   
  </footer>
  
  <div class="control-sidebar-bg"></div>
</div>
<script>
  $(document).ready(function(){
      setTimeout(function() {
          $('.alert-success').remove();
      }, 4000);
  }); 
</script>
    
    <script>
    //$.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('assets/js')}}/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="{{asset('assets/js')}}/raphael.min.js"></script>
    <script src="{{asset('assets/js')}}/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="{{asset('assets/js')}}/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="{{asset('assets/plugins')}}/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{asset('assets/plugins')}}/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <script src="{{asset('assets/js')}}/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{asset('assets/js')}}/moment.min.js"></script>
    <script src="{{asset('assets/js')}}/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="{{asset('assets/js')}}/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('assets/plugins')}}/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="{{asset('assets/js')}}/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{{asset('assets/js')}}/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/js')}}/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('assets/js')}}/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('assets/js')}}/demo.js"></script>

    <script src="{{asset('assets/js')}}/es6-promise.auto.min.js"></script>

    <script src="{{asset('assets/js')}}/es6-promise.min.js"></script>
</body>
</html>