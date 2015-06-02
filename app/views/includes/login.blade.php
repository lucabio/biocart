<div class="login">
    @if(Session::get('flash_messages'))
        {{ '<span class=\'error\'>'. Session::get('flash_messages') . '</span>' }}
    @endif
    @if(Auth::guest())
    {{ Form::open(['route' => 'sessions.store']) }}
        <p>Login Form</p>
        <div class="log">
            {{ Form::label('username','Username') }}
            {{ Form::text('username') }}
            {{ $errors->first('username') }}
        </div>
        <div class="log">
            {{ Form::label('password','Password') }}
            {{ Form::password('password')}}
            {{ $errors->first('password') }}
            <div class="btn">{{ Form::submit('LOGIN') }}</div>
        </div>

    {{ Form::close() }}
    @else
        <p> Welcome <b>{{ Auth::user()->username}}</b></p>

        <p>{{ HTML::linkAction('SessionsController@destroy', 'LOGOUT') }}</p>
    @endif
</div>