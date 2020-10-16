@extends('layouts.inner')

@section('content')
<section class="content-header">
   <h1>users</h1>
   <ol class="breadcrumb">
      <li><a href="{{ route('users') }}"><i class="fa fa-dashboard"></i> users</a></li>
      <li class="active">List</li>
   </ol>
</section>

<section class="content">
      <a href="{{ route('users') }}" class="pull-right"> Back</a> 
      <form action="{{ route('user.history', $user->id) }}" method="GET" id="limitForm" autocomplete="off">
      <div class="form-group input-group col-xl-12 col-lg-12 col-md-12 col-12 col-sm-12 col-xs-12">
         <div class="form-group col-xl-6 col-lg-6 col-md-6 col-6 col-sm-6 col-xs-6">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" value="{{$start_date}}" class="form-control" placeholder="route Date">
         </div>
         <div class="form-group col-xl-6 col-lg-6 col-md-6 col-6 col-sm-6 col-xs-6">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" value="{{$end_date}}" class="form-control" placeholder="route Date">
         </div>
          <span class="input-group-btn">
         <button class="btn btn-secondary" type="submit">Search</button>
         </span>
      </div>
   </form>
      <!-- row -->
      <div class="row">
        <div class="col-md-12">

           @foreach($histories as $key => $history)
           <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">     
            <span class="bg-red"  data-toggle="collapse" data-target="#{{$key}}" style="cursor: pointer;">
               {{ $history[0]->created_at->format('d-M-Y') }}
               </span>
            </li>
             <li>
              <i class="fa fa-history bg-blue"></i>

              <div class="timeline-item">
                <h3 class="timeline-header"><a href="#">User</a></h3>
                              
                <div class="timeline-body collapse" id="{{$key}}">
                 @foreach($history as $data)
                 <div>
                    <a href="#"> {{ $data->detail }}:</a>
                     {{ $data->comment }}
                      <i class="fa fa-clock-o pull-right" aria-hidden="true"> <a href="#">{{ $data->created_at->format('h:i:s') }} </i></a> 
                  </div>  
                 @endforeach 
                </div>  
            
     
              </div>
            </li>
          </ul>
           @endforeach 
            <!-- /.timeline-label -->
            <!-- timeline item -->
       
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</section>
<script type="text/javascript">
   $('#start_date').change(function(){
        $('#limitForm').submit();
   });
   $('#end_date').change(function(){
        $('#limitForm').submit();
   });
</script>
@endsection

