@extends('layouts.inner')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>Users</h1>
   <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('users') }}">User</a></li>
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
            @if(!empty($user->id))
            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
               @else
            <form action="{{ route('user.create') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
               @endif
               {{ csrf_field() }}
               <div class="box-body">
                  <div class="col-md-12">
                     <div class="col-md-6">
                        <div class="tab-content">
                           <div class="tab-pane active" id="home">
                              <div class="form-group">
                                 <label for="fname">First Name  <span aria-hidden="true" class="required">*</span></label>
                                 <input type="text" name="fname" id="fname" value="{{ old('fname', $user->fname) }}" class="form-control" placeholder="First Name">
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
                                 <label for="lname">Last Name  <span aria-hidden="true" class="required">*</span></label>
                                 <input type="text" name="lname" id="lname" value="{{ old('lname', $user->lname) }}" class="form-control" placeholder="Last Name">
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
                              <div class="form-group">
                                 <label for="country">Country <span aria-hidden="true" class="required">*</span></label>
                                 <input type="text" name="country" id="country" value="{{ old('country', $user->country) }}" class="form-control" placeholder="Country">
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
                                 <label for="role_id">Select Role <span aria-hidden="true" class="required">*</span></label>
                                 <select name="role_id" id="role_id" class="js-example-basic-single form-control">
                                    <option value="">Select Role</option>
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}" <?php if(!empty($user->id) && $user->role_id == $role->id){ echo 'selected'; } ?> >{{$role->role}}
                                    </option>
                                    @endforeach
                                 </select>
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
                               <div class="form-group">
                                 <label for="region">Region <span aria-hidden="true" class="required">*</span></label>
                                 <input type="text" name="region" id="region" value="{{ old('region', $user->region) }}" class="form-control" placeholder="Region">
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
                                 <label for="profile_image">Profile Image <span aria-hidden="true" class="required">*</span></label>
                                 <input type="file" name="profile_image" onchange="readURL(this);" id="profile_image" value="{{ old('profile_image', $user->profile_image)}}" class="form-control" placeholder="profile_image">
                                 <img id="blah" style="display: none;"src="#" height="100" width="100" />
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
                               <div class="form-group">
                                 <label for="email">Email <span aria-hidden="true" class="required">*</span></label>
                                 <input type="email" name="email" id="email" value="{{ old('email', $user->email)}}" class="form-control" placeholder="Email">
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
                                 <label for="mobile">Mobile <span aria-hidden="true" class="required">*</span></label>
                                 <input type="text" min="0" name="mobile" id="mobile" onkeypress="return isNumber(event)"  value="{{ old('mobile', $user->mobile)}}" class="form-control" placeholder="Mobile">
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
                               <div class="form-group">
                                 <label for="landline_num">Alternate Number</label>
                                 <input type="text" min="0" name="landline_num" id="landline_num" onkeypress="return isNumber(event)" value="{{ old('landline_num', $user->landline_num)}}" class="form-control" placeholder="Alternate Number">
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
                                 <label for="identification_no">Identification No <span aria-hidden="true" class="required">*</span></label>
                                 <input type="text" name="identification_no" id="identification_no" value="{{ old('identification_no', $user->identification_no)}}" class="form-control" placeholder="Identification No.">
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
                              <div class="form-group">
                                 <label for="id_image">Identification Proof <span aria-hidden="true" class="required">*</span></label>
                                 <input type="file" name="id_image"  onchange="readTwo(this);" id="id_image" value="{{ old('id_image', $user->id_image)}}" class="form-control" placeholder="Passport No">
                                 <img id="two" style="display: none;"src="#" height="40" width="40" />
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
                                 <label for="passport_no">Passport No <span aria-hidden="true" class="required">*</span></label>
                                 <input type="text" name="passport_no" id="passport_no" value="{{ old('passport_no', $user->passport_no)}}" class="form-control" placeholder="Passport No">
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
                             <div class="form-group">
                                 <label for="passport_image">Passport Image <span aria-hidden="true" class="required">*</span></label>
                                 <input type="file" name="passport_image"  onchange="readOne(this);" id="passport_image" value="{{ old('passport_image', $user->passport_image)}}" class="form-control" placeholder="Passport Image">
                                 <img id="one" style="display: none;"src="#" height="40" width="40" />
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
                                 <label for="address">Address <span aria-hidden="true" class="required">*</span></label>
                                 <textarea type="text" name="address" id="address" value="{{ old('address', $user->address)}}" class="form-control" placeholder="Address">{{old('address', $user->address)}}</textarea>
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
                               <div class="form-group">
                                 <label for="username">Username <span aria-hidden="true" class="required">*</span></label>
                                 <input type="text" name="username" id="username" value="{{ old('username', $user->username)}}" class="form-control" placeholder="Username">
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
                                 <label for="password">Password <span aria-hidden="true" class="required">*</span></label>
                                 <input type="password" name="password" id="password" value="" class="form-control" placeholder="Password">
                              </div>
                           </div>
                           <!--/tab-pane-->
                        </div>
                    </div>
                    @if(Auth()->user()->role_id == 1 && Auth()->user()->provider_id==2)
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="provider_id">Select Company <span aria-hidden="true" class="required">*</span></label>
                           <select name="provider_id" id="provider_id" class="js-example-basic-single form-control">
                              <option value="">Select Company</option>
                              @foreach($clients as $client)
                              <option value="{{$client->id}}" <?php if(!empty($user->id) && $user->provider_id == $client->id){ echo 'selected'; } ?> >{{$client->title}}
                              </option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     @endif
                  </div>
                  </div>
               <div class="box-footer">
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
               </div>
                  </div>
            </form>
         </div>
      </div>
   </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$('.js-example-basic-single').select2();
});
</script>s
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                      document.getElementById("blah").style.display = "block";
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readOne(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                      document.getElementById("one").style.display = "block";
                    $('#one').attr('src', e.target.result);
                }
               
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readTwo(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                      document.getElementById("two").style.display = "block";
                    $('#two').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

      function isNumber(evt)
      {
        var charCode = (evt.which) ? evt.which : event.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

          return true;
      }
  </script>
@endsection