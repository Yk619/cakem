@extends('layouts.inner')
@section('content')
<section class="content-header">
   <h1>questions</h1>
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
               <h3 class="box-title">question</h3>
               <a href="{{ url('assignTask/'.$uid )}}" class="breadcrumb pull-right">Back</a>
            </div>
            <div class="box-body">
               @foreach($taskAnswers as $ans)
               <div class="col-xl-12 col-lg-12 col-md-12 col-12 col-sm-12 col-xs-12">
                  <div class="form-group col-xl-6 col-lg-6 col-md-6 col-6 col-sm-6 col-xs-6">
                     <strong>Question Text:</strong>
                  </div>
                  <div class="form-group col-xl-6 col-lg-6 col-md-6 col-6 col-sm-6 col-xs-6">
                     {{ $ans['question_text'] }}
                  </div>
               </div>
               <div class="col-xl-12 col-lg-12 col-md-12 col-12 col-sm-12 col-xs-12">
                  <div class="form-group col-xl-6 col-lg-6 col-md-6 col-6 col-sm-6 col-xs-6">
                     <strong>Answer Submitted:</strong>
                  </div>
                  <div class="form-group col-xl-6 col-lg-6 col-md-6 col-6 col-sm-6 col-xs-6">
                     @if($ans['answer_type'] != 'take_photo' && $ans['answer_type'] != 'document')
                     {{$ans['answer']}}
                     @else
                     @if($ans['answer_type'] == 'take_photo')
                     <a href="#" class="pop">
                     <img id="imageresource" src="{{ env('APP_URL').'/storage/app/'.$ans['file_name'] }}" width="50" height="50">
                     </a>
                     @else
                     <a href="{{ env('APP_URL').'/storage/app/'.$ans['file_name'] }}"> 
                     {{ $ans['file_name'] }}</a>
                     @endif  
                     @endif
                  </div>
               </div>
               <div class="col-xl-12 col-lg-12 col-md-12 col-12 col-sm-12 col-xs-12">
                  <div class="form-group col-xl-6 col-lg-6 col-md-6 col-6 col-sm-6 col-xs-6">
                     <strong>Answer Type:</strong>
                  </div>
                  <div class="form-group col-xl-6 col-lg-6 col-md-6 col-6 col-sm-6 col-xs-6">
                     {{ $ans['answer_type'] }}
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