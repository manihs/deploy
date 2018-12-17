@extends('layouts.app')

@section('content')
<div class="lcontainer">
  <div class="centered-element">
    <form method="POST" action="{{ route('login') }}">
    @csrf
        <div class="group-input">
    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
        </div> 
        <div class="group-input">
    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>    
        </div>
        <div class="btn cntr">
          <input type="submit" value="login">
        </div>
        <div class="login_link">
          <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>   
        </div>
        <div class="login_link">
          <a href="">Don't have account? create account</a>
        </div>
    </form>
  </div>
</div>

<form method="POST" action="{{ route('login') }}">
    @csrf

  <div class="logincontainer">
    <label for="uname"><b>{{ __('E-Mail Address') }}</b></label>
    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
    @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif

    <label for="psw"><b>{{ __('Password') }}</b></label>
    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>    
    @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
        </span>                        
    @endif
        
    <button type="submit">Login</button>

    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    <label class="form-check-label" for="remember">
        {{ __('Remember Me') }}
    </label>
  </div>

  <div class="logincontainer" style="background-color:#f1f1f1">
    <button type="button" onclick="" class="cancelbtn">Register</button>
    <span class="psw">Forgot <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a></span>
  </div>
</form>
@endsection
