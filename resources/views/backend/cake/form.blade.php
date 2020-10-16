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
         @if($errors->any())
         <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach()
         </div>
         @endif
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
                       <input type="text" name="name" id="name" value="{{ old('name', $cake->name)}}" class="form-control" placeholder="cake Name">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                       <label for="image">cake Name <span aria-hidden="true" class="required">*</span></label>
                       <input type="file" name="image" id="image" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                       <label for="price">Price <span aria-hidden="true" class="required">*</span></label>
                       <input type="text" name="price" id="price" value="{{ old('price', $cake->price)}}" class="form-control" placeholder="Price">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                       <label for="quantity">Quantity <span aria-hidden="true" class="required">*</span></label>
                       <input type="text" name="quantity" id="quantity" value="{{ old('quantity', $cake->quantity)}}" class="form-control" placeholder="Quantity">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                       <label for="weight">Weight(KG) <span aria-hidden="true" class="required">*</span></label>
                       <input type="text" name="weight" id="weight" value="{{ old('weight', $cake->weight)}}" class="form-control" placeholder="Weight">
                    </div>
                  </div>

                   <div class="col-md-6">
                      <div class="form-group">
                         <label for="category">cake Type <span aria-hidden="true" class="required">*</span></label>
                         <select name="category" id="category" class="js-example-basic-single form-control">
                           <option value="veg">Veg</option>
                           <option value="non-veg">Non-veg</option>
                         </select>
                      </div>    
                    </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
               </div>
            </form>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
            <script type="text/javascript">
            $(document).ready(function() {
            $('.js-example-basic-single').select2();
            $('#cake_image').on('change', function(){ //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {

            var data = $(this)[0].files; //this file data
         
            $.each(data, function(index, file){ //loop though each file
            if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                var fRead = new FileReader(); //new filereader
                fRead.onload = (function(file){ //trigger function on successful read
                return function(e) {
                    var img = $('<img height="40" width="40"/>').addClass('thumb').attr('src', e.target.result); //create image element 
                    $('#preview_img').append(img); //append image to output element
                };
                })(file);
                fRead.readAsDataURL(file); //URL representing the file's data.
               }
               });
         
            }else{
               alert("Your browser doesn't support File API!"); //if File API is absent
               }
            });
            });
            </script>
            <script>
               $("#cake_name").blur(function()  {
                     var str  = $("#cake_name").val();
                     var pd = $("#category").val();
                     var bd = $("#brand").val();
                     str = str.replace(/\s+/g, '-'); 
                     document.getElementById("sku_code").value = str+ pd + bd ;       
                   });
               
            </script>
         </div>
      </div>
   </div>
</section>
@endsection