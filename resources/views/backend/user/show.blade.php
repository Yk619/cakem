@extends('layouts.inner')
@section('content');
<section class="content-header">
   <h1>Users</h1>
   <ol class="breadcrumb">
      <li><a href="{{ route('users') }}"><i class="fa fa-dashboard"></i> Users</a></li>
      <li class="active">List</li>
   </ol>
</section>
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box">
            <div class="box-header with-border">
               <h3 class="box-title">user</h3>
               <a href="{{ route('users') }}" class="breadcrumb pull-right"> Back</a>
            </div>
            <div class="box-body" style="padding: 30px;">
               <div class="col-md-12 text-center">
                  @if(!empty($user->profile) && isset($user->profile))
                  <img src="{{ env('APP_URL').'/storage/app/'.$user->profile->file_name }}" class="avatar img-circle img-thumbnail" alt="avatar" width="200px">
                  @else
                  <img src="{{ asset('assets/img/default_avatar.jpeg') }}" id="pop" width="100" height="100" style="border-radius: 50%;">
                  @endif
               </div>
               <div class="col-md-12">
                  <div class="col-md-6">
                     <div class="tab-content">
                        <div class="tab-pane active" id="home">
                           <div class="form-group">
                              <label for="fname">First Name</label>
                              <input type="text" name="fname" id="fname" value="{{ old('fname', $user->fname) }}" class="form-control" style="border-radius: 5px;"  placeholder="First Name" disabled>
                           </div>
                           <div class="form-group">
                              <label for="lname">Last Name</label>
                              <input type="text" name="lname" id="lname" value="{{ old('lname', $user->lname) }}" class="form-control" style="border-radius: 5px;"  placeholder="Last Name" disabled>
                           </div>
                        </div>
                        <!--/tab-pane-->
                     </div>
                     <!--/tab-content-->       
                  </div>
                  <div class="col-md-6">
                     <div class="tab-content">
                        <div class="tab-pane active" id="home">
                           <div class="form-group">
                              <label for="email">Email</label>
                              <input type="text" name="email" id="email" value="{{ old('email', $user->email)}}" class="form-control" placeholder="Email" style="border-radius: 5px;"  disabled>
                           </div>
                           <div class="form-group">
                              <label for="country">Country</label>
                              <input type="text" name="country" id="country" value="{{ old('country', $user->country) }}" class="form-control" placeholder="Country" style="border-radius: 5px;"  disabled>
                           </div>
                        </div>
                        <!--/tab-pane-->
                     </div>
                     <!--/tab-content-->       
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="role_id">Role</label>
                        <input type="text" name="role_id" id="role_id" value="{{ old('role_id', $user->role_id) }}" class="form-control" style="border-radius: 5px;"  placeholder="Role" disabled>
                     </div>
                  </div>
                  <!--  <div class="col-md-6 text-center">
                     <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar" width="150px">
                     </div> -->
                  <div class="col-md-6">
                     <div class="tab-content">
                        <div class="tab-pane active" id="home">
                           <div class="form-group">
                              <label for="address">Address</label>
                              <textarea type="text" name="address" id="address" value="{{ old('address', $user->address)}}" class="form-control" style="border-radius: 5px;" placeholder="Address" disabled>{{old('address', $user->address)}}</textarea>
                           </div>
                        </div>
                        <!--/tab-pane-->
                     </div>
                     <!--/tab-content-->       
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="col-md-6">
                     <div class="tab-content">
                        <div class="tab-pane active" id="home">
                           <div class="form-group">
                              <label for="passport_no">Passport No</label>
                              <input type="text" name="passport_no" id="passport_no" value="{{ old('passport_no', $user->passport_no)}}" class="form-control" style="border-radius: 5px;"  placeholder="Passport No" disabled>
                           </div>
                        </div>
                        <!--/tab-pane-->
                     </div>
                     <!--/tab-content-->                
                  </div>
                  <div class="col-md-6">
                     <div class="col-md-6 text-center">
                        @if(!empty($user->pass) && isset($user->pass))
                        <img src="{{ env('APP_URL').'/storage/app/'.$user->pass->file_name }}" class="avatar img-circle img-thumbnail" alt="avatar" width="100px">
                        @else
                        <img src="{{ asset('assets/img/default_avatar.jpeg') }}" id="pop" width="100" height="100" style="border-radius: 50%;">
                        @endif
                        <div>Passport Image</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="col-md-6">
                     <div class="tab-content">
                        <div class="tab-pane active" id="home">
                           <div class="form-group">
                              <label for="identification_no">Identification No</label>
                              <input type="text" name="identification_no" id="identification_no" value="{{ old('identification_no', $user->identification_no)}}" style="border-radius: 5px;" class="form-control" placeholder="Identification No." disabled>
                           </div>
                        </div>
                        <!--/tab-pane-->
                     </div>
                     <!--/tab-content-->                
                  </div>
                  <div class="col-md-6">
                     <div class="col-md-6 text-center">
                        @if(!empty($user->file) && isset($user->file))
                        <img src="{{ env('APP_URL').'/storage/app/'.$user->file->file_name }}" class="avatar img-circle img-thumbnail" alt="avatar" width="100px">
                        @else
                        <img src="{{ asset('assets/img/default_avatar.jpeg') }}" id="pop" width="100" height="100" style="border-radius: 50%;">
                        @endif
                        <div>Identification Image</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="col-md-6">
                     <div class="tab-content">
                        <div class="tab-pane active" id="home">
                           <div class="form-group">
                              <label for="mobile">Mobile</label>
                              <input type="text" name="mobile" id="mobile" value="{{ old('mobile', $user->mobile)}}" class="form-control" placeholder="Mobile" style="border-radius: 5px;" disabled>
                           </div>
                           <div class="form-group">
                              <label for="landline_num">Landline</label>
                              <input type="text" name="landline_num" id="landline_num" value="{{ old('landline_num', $user->landline_num)}}" class="form-control" placeholder="Landline"  style="border-radius: 5px;" disabled>
                           </div>
                        </div>
                        <!--/tab-pane-->
                     </div>
                     <!--/tab-content-->       
                  </div>
                  <div class="col-md-6">
                     <div class="tab-content">
                        <div class="tab-pane active" id="home">
                           <div class="form-group">
                              <label for="region">Region</label>
                              <input type="text" name="region" id="region" value="{{ old('region', $user->region) }}" class="form-control" placeholder="Region" style="border-radius: 5px;" disabled>
                           </div>
                           <div class="form-group">
                              <label for="country">Country</label>
                              <input type="text" name="country" id="country" value="{{ old('country', $user->country) }}" class="form-control" placeholder="Country" style="border-radius: 5px;"  disabled>
                           </div>
                        </div>
                        <!--/tab-pane-->
                     </div>
                     <!--/tab-content-->       
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="col-md-6">
                     <div class="tab-content">
                        <div class="tab-pane active" id="home">
                           <div class="form-group">
                              <label for="username">Username</label>
                              <input type="text" name="username" id="username" value="{{ old('username', $user->username)}}" class="form-control" style="border-radius: 5px;" placeholder="Username" disabled>
                           </div>
                        </div>
                        <!--/tab-pane-->
                     </div>
                     <!--/tab-content-->       
                  </div>
                  <div class="col-md-6">
                     <div class="tab-content">
                        <div class="tab-pane active" id="home">
                           <div class="form-group">
                              <label for="password">Password</label>
                              <input type="text" name="password" id="password" value="" class="form-control" style="border-radius: 5px;" placeholder="Password" disabled>
                           </div>
                        </div>
                        <!--/tab-pane-->
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="col-md-6">
                     <div class="tab-content">
                        <div class="tab-pane active" id="home">
                        </div>
                        <!--/tab-pane-->
                     </div>
                     <!--/tab-content-->       
                  </div>
                  <div class="col-md-6">
                     <div class="tab-content">
                        <div class="tab-pane active" id="home">
                           <div class="form-group pull-right">
                              <a href="{{ route('user.formValue', $user->id) }}" class="mr-2 btn-lg btn-info"><i class = "fa fa-address-card"></i></a>
                              <a href="{{ route('user.assignTask', $user->id) }}" class="mr-2 btn-lg btn-info"><i class = "fa fa-list"></i></a>
                           </div>
                        </div>
                        <!--/tab-pane-->
                     </div>
                     <!--/tab-content-->       
                  </div>
               </div>
            </div>
            <!--/box-body-->
         </div>
         <!--/box-->
      </div>
      <!--12-->
   </div>
   <!--/row-->
</section>
@endsection