@extends('layouts.inner')

@section('content')

    <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Dashboard</h1><br>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <br>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>10</h3>
            <p>Added Locations</p>
          </div>
          <div class="icon">
            <i class="fa fa-map-marker"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-xs-6">          
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>40</h3>
             <p>Total Orders</p>
              </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
        </div>
      </div>

    </div>   
  </section>

@endsection