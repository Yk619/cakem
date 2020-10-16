@extends('layouts.inner')

@section('content')

    <!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Agents</h1>
  <ol class="breadcrumb">
    <li><a href="{{route('users')}}"><i class="fa fa-dashboard"></i> Agents</a></li>
    <li class="active">List</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    @if(Session::has('success_msg'))
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 col-sm-12 col-xs-12"> 
          <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
        </div>
    @endif
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 col-sm-12 col-xs-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Assigned Tasks</h3>
          <!--<a class="breadcrumb" href="{{route('user.form')}}" style="float: right;">Add New</a>-->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th>Task Name</th>
              <th>Assignee</th>
              <th>Question Count</th>
              <th style="width: 150px">Action</th>
            </tr>                
            @if($assigns && count($assigns)>0)
              @foreach($assigns as $key => $assign)
                <tr>
                  <td>{{ $assign->title }}</td>
                  <td>{{ $assign->type }}</td>  
                  <td>{{ $assign->question_count }}</td>  
                  <td>
                    @if(($assign->is_completed)== 0)
                     <a href="{{ route('task.show', $assign->task_id) }}" class="mr-2 btn-sm btn-warning"><i class = "fa fa-eye"></i></a>
                    @else
                     <a href="{{ url('user/taskAnswer/'.$uid.'/'.$assign->task_id )}}" class="mr-2 btn-sm btn-info"><i class = "fa fa-check"></i></a>
                     @endif 
                  </td>                   
                </tr>
              @endforeach
              @else
                <tr>
                  <td colspan="4">No entries found.</td>
                </tr>
            @endif     
          </table>
        </div>
    
      </div>
    </div>
  </div>

</section>
  
@endsection