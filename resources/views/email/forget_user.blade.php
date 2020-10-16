@extends('email.mailbody')
@section('content')  
    <div class="textmain">
      <div class="row">
        <h4>Hi {{ ucfirst($user->fname) }}! </h4>
        <h4>Here is your new password.</h4>
        	<h4>New Email: {{ $user->email }}</h4>
        @if(!empty($password))
        	<h4>New Password: {{ $code }}</h4>
        @endif
        <br/> <h4>Please <a href="{{ env('FrontendUrl').'home' }}"> Click Here </a> to go to our side.</h4><br/>
      </div>
    </div>

@endsection