@extends('layouts.inner')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>Agents</h1>
   <ol class="breadcrumb">
      <li><a href="{{ route('users') }}"><i class="fa fa-dashboard"></i> Agents</a></li>
      <li class="active">List</li>
   </ol>
</section>
<section class="content">
   <form action="{{ route('users') }}" method="GET" id="limitForm" autocomplete="off">
      <div class="form-group input-group col-xl-4 col-lg-4 col-md-4 col-4 col-sm-4 col-xs-4 pull-right">
         <input type="text" class="form-control" name="searchkey" placeholder="Search for..." value="{{ isset($searchkey) ? $searchkey : '' }}">
         <span class="input-group-btn">
         <button class="btn btn-secondary" type="submit">Search</button>
         </span>
      </div>
      <div id="div" class="form-group">
         <select name="limit" id="myselect">
         <option value="1" {{ ($limit == 1) ? 'selected' : '' }}>1</option>
         <option value="10" {{ ($limit == 10) ? 'selected' : '' }}>10</option>
         <option value="20" {{ ($limit == 20) ? 'selected' : '' }}>20</option>
         <option value="50" {{ ($limit == 50) ? 'selected' : '' }}>50</option>
         </select>
      </div>
   </form>
   <div class="row">
      @if(Session::has('success_msg'))
      <div class="col-xl-12 col-lg-12 col-md-12 col-12 col-sm-12 col-xs-12">
         <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
      </div>
      @endif
      <div class="col-xl-12 col-lg-12 col-md-12 col-12 col-sm-12 col-xs-12">
         <div class="box">
            <div class="box-header with-border">
               <h3 class="box-title">User List</h3>
               <a class="breadcrumb" href="{{route('user.form')}}" style="float: right;">Add New</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table class="table table-bordered">
                  <tr>
                     <th style="width: 10px">#</th>
                     <th>Avatar</th>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Email</th>
                     <th>Role</th>
                     <th>Company</th>
                     <!-- <th>Role_ID</th>
                        <th>Region</th>
                        <th>Country</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>UserCode</th>-->
                     <th>Username</th>
                     <th style="width: 200px">Action</th>
                  </tr>
                  <?php $i ='';
                     $i = $users->perPage() * ($users->currentPage() - 1);
                     $i = $i+1;
                     $q = [];
                     ?>                   
                  @if($users && count($users)>0)
                  @foreach($users as $key => $user)
                  <?php 
                  $dpImg = asset('assets/img/avatar.png');
                  if(!empty($user->avatar->file_name) && \Storage::disk('local')->exists($user->avatar->file_name)){
                     $dpImg = env('APP_URL').'/storage/app/'.$user->avatar->file_name;
                  } ?>
                  <tr>
                     <td>{{$i++}}</td>
                     <td><img src="{{$dpImg}}" height="20" width="20" style="border-radius:50%;"/></td>
                     <td>{{ $user->fname }}</td>
                     <td>{{ $user->lname }}</td>
                     <td>{{ $user->email }}</td>
                     <td>{{ $user->userRole->role }}</td>
                     <td>{{ $user->client->title }}</td>
                     <!--  <td>{{ $user->title }}</td>
                        <td>{{ $user->region }}</td>
                        <td>{{ $user->country }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile }}</td> 
                        <td>{{ $user->user_code }}</td>
                        <td>{{ $user->landline_num }}</td>-->
                     <td>{{ $user->username }}</td>
                     <td>
                        <a href="{{ route('user.changeStatus', $user->id) }}" class="{{ ($user->status == 0) ? 'mr-2 btn-sm btn-info activeBtn' : 'mr-2 btn-sm btn-danger activeBtn'}}" status="{{ ($user->status == 0) ? 'deactivate' : 'activate' }} "><i class="fa {{ ($user->status == 1) ? 'fa fa-lock' : 'fa fa-unlock' }} "></i></a>
                        <!--  <a href="{{ route('user.assignTask', $user->id) }}" class="mr-2 btn-sm btn-info"><i class = "fa fa-list"></i></a>-->
                        <a href="{{ route('user.show', $user->id) }}" class="mr-2 btn-sm btn-info"><i class = "fa fa-eye"></i></a> 
                         <a href="{{ route('user.history', $user->id) }}" class="mr-2 btn-sm btn-info"><i class = "fa fa-history"></i></a>   
                        <a href="{{ route('user.form', $user->id) }}" class="mr-2 btn-sm btn-primary"><i class = "fa fa-edit"></i></a>            
                        <a href="{{ route('user.delete', $user->id) }}" class="mr-2 btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')"><i class = "fa fa-trash"></i></a>
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
            <!-- /.box-body -->
            <div class="box-footer clearfix">
               {{ $users->appends(['limit' => $limit,'status' => $status])->links() }}
            </div>
         </div>
         <script type="text/javascript">
            $('.activeBtn').click(function(){
            
              var status = $(this).attr('status');
            
              var x = confirm("Do you want to "+status+" this user?");
            
              if(x){
                return true;
              }else{
                return false;
              }
              
            })
                
         </script>
         <script type="text/javascript">
            $('#myselect').change(function(){
              $('#limitForm').submit();
            });
         </script>
      </div>
   </div>
</section>
@endsection