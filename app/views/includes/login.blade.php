<div class="login">
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
    <div>
        <p> Welcome <b>{{ Auth::user()->username}}</b></p>

        <p>{{ HTML::linkAction('SessionsController@destroy', 'LOGOUT') }}</p>


        <p>You have {{ Product::getItemInCart() }} product/s in your cart</p>
        <p><a href="{{ URL::to('shop') }}">Proceed to checkout</a></p>
        <p><a href="{{ URL::to('empty') }}">Empty cart</a></p>
    </div>
    @endif
</div>