    <div class="textmain">
      <div class="row">
     <h4>Hi {{ $user->fname }}! </h4>
        <h4>Here is your new code.</h4>
        	<h4>Your Email: {{ $user->email }}</h4>
        @if(!empty($code))
        	<h4>Try with this OTP: {{ $code }}</h4>
        @endif
        <br/> <h4>Please <a href="{{ env('FrontendUrl').'home' }}"> Click Here </a> to go to our side.</h4><br/>
      </div>
    </div>

