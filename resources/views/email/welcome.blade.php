 <div class="textmain">
      <div class="row">
     <h4>Hi {{ $user['fname'] }}! </h4>
        <h4>Here is your email.</h4>
        	<h4>your Email: {{ $user['email'] }}</h4>
        	<h4>your Password: {{ $user['encpass']}}</h4>
        <br/> <h4>Please <a href="{{ env('FrontendUrl').'home' }}"> Click Here </a> to go to our side.</h4><br/>
      </div>
    </div>