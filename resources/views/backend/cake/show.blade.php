@extends('layouts.inner')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>cakes</h1>
   <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('cakes') }}">Cakes</a></li>
      <li class="active">Add</li>
   </ol>
</section>
<section class="content">
   <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-12 col-sm-12 col-xs-12">
         <div class="box box-primary">
            @if(!empty($cake->id))
            <form action="{{ route('cake.update', $cake->id) }}" method="POST" enctype="multipart/form-data">
             
            @else
            <form action="{{ route('cake.create') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @endif
              {{ csrf_field() }}
              <div class="box-body">
                <div class="col-md-12">
                  <div class="col-md-6">
                    <div class="form-group">
                       <label for="name">cake Name <span aria-hidden="true" class="required">*</span></label>
                       <input type="text" name="name" id="name" value="{{ old('name', $cake->name)}}" class="form-control" placeholder="cake Name" disabled="">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                       <img src="{{env('APP_URI').'/storage/app/'.$cake->image}}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                       <label for="price">Price <span aria-hidden="true" class="required">*</span></label>
                       <input type="text" name="price" id="price" value="{{ old('price', $cake->price)}}" class="form-control" placeholder="Price" disabled="">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                       <label for="quantity">Quantity <span aria-hidden="true" class="required">*</span></label>
                       <input type="text" name="quantity" id="quantity" value="{{ old('quantity', $cake->quantity)}}" class="form-control" placeholder="Quantity" disabled="">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                       <label for="weight">Weight(KG) <span aria-hidden="true" class="required">*</span></label>
                       <input type="text" name="weight" id="weight" value="{{ old('weight', $cake->weight)}}" class="form-control" placeholder="Weight" disabled="">
                    </div>
                  </div>

                   <div class="col-md-6">
                      <div class="form-group">
                         <label for="category">cake Type <span aria-hidden="true" class="required">*</span></label>
                         <input type="text" name="type" id="weight" value="{{ $cake->type}}" class="form-control" placeholder="Weight" disabled="">
                      </div>    
                    </div>
                </div>
              </div>
            </form>
         </div>
      </div>
   </div>
</section>
@endsection