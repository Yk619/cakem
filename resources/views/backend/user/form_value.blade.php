@extends('layouts.inner')
@section('content')
<section class="content-header">
   <h1>Form Values</h1>
   <ol class="breadcrumb">
      <li><a href="{{ route('users') }}"><i class="fa fa-dashboard"></i> Agents</a></li>
      <li class="active">List</li>
   </ol>
</section>
<section class="content">
   <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-12 col-sm-12 col-xs-12">
         <div class="box">
            <div class="box-header with-border">
               <h3 class="box-title">Forms</h3>  
                <a href="{{ url('user/show/'.$id) }}" class="breadcrumb pull-right"> Back</a>
                <a class="breadcrumb" href="{{route('user.exportActivity', $id)}}" style="float: right; margin-left: 20px;">Export</a>
            </div>
            <div class="box-body">
                @foreach($form as $one)
                @if($one->field_type == 'header' || $one->field_type == 'paragraph')
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 col-sm-12 col-xs-12">
                  <div class="form-group col-xl-6 col-lg-6 col-md-6 col-6 col-sm-6 col-xs-6">
                     <strong>Label:</strong> 
                  </div>
                  <div class="form-group col-xl-6 col-lg-6 col-md-6 col-6 col-sm-6 col-xs-6">
                     <h4>{{ $one->label }}</h4>
                  </div>               
               </div>
               @endif
               @endforeach 
               @foreach($formValues as $ans)
               <div class="col-xl-12 col-lg-12 col-md-12 col-12 col-sm-12 col-xs-12">
                  <div class="form-group col-xl-6 col-lg-6 col-md-6 col-6 col-sm-6 col-xs-6">
                     <strong>Label:</strong> 
                  </div>
                  <div class="form-group col-xl-6 col-lg-6 col-md-6 col-6 col-sm-6 col-xs-6">
                     {{ $ans['field_type'] }}
                  </div>               
               </div>
               <div class="col-xl-12 col-lg-12 col-md-12 col-12 col-sm-12 col-xs-12">
                  <div class="form-group col-xl-6 col-lg-6 col-md-6 col-6 col-sm-6 col-xs-6">
                     <strong>Answer Submitted:</strong>
                  </div>
                  <div class="form-group col-xl-6 col-lg-6 col-md-6 col-6 col-sm-6 col-xs-6">
                     @if($ans['field_type'] != 'signature' && $ans['field_type'] != 'file')
                     {{ $ans['value'] }}
                     @else
                     @if(($ans['field_type'] == 'signature') || ($ans['field_type'] == 'photo'))
                     @if(!empty($ans->file))
                     <a href="#" class="pop">
                     <img id="imageresource" src="{{ env('APP_URL').'/storage/app/'.$ans->file->file_name }}" width="50" height="50"></a>
                     @else
                     <a>
                     <img src="{{ asset('assets/img/default_avatar.jpeg') }}"  width="100" height="100" style="border-radius: 50%;">
                     </a>
                     @endif
                     @else
                     @if(!empty($ans->file))
                     <a href="{{ '/Trackbot/storage/app/'.$ans->file->file_name }}"> 
                     {{ $ans->file->file_name }}</a>
                     @else
                     File Not Uploaded.
                     @endif  
                     @endif
                     @endif
                  </div>

<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">              
      <div class="modal-body">
         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
       <img src="" class="imagepreview" style="width: 100%;" >
      </div>
    </div>
  </div>
</div>
               </div>

               @endforeach         
            </div>
         </div>
      </div>
      <script type="text/javascript">
        $(function() {
      $('.pop').on('click', function() {
         $('.imagepreview').attr('src', $(this).find('img').attr('src'));
         $('#imagemodal').modal('show');   
      });      
});
         
      </script>
   </div>
</section>
@endsection