@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-auto m-auto">
      <div class="card mt-5">
        <div class="card-header text-center">Login</div>

        <div class="card-body">
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
              <label for="username">Login</label>
              <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

              @if ($errors->has('username'))
              <div class="invalid-feedback">{{ $errors->first('username') }}</div>
              @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password">Password</label>
              <input id="password" type="password" class="form-control" name="password" required>

              @if ($errors->has('password'))
              <div class="invalid-feedback">{{ $errors->first('password') }}</div>
              @endif
            </div>

            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
              </label>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Login</button>
              <a href="{{ url('login/google') }}" class="btn btn-info">or Login with <i class="fa fa-google-plus" aria-hidden="true"></i></a>
            </div>
            <div class="form-group">
              <a class="btn btn-light" href="{{ route('password.request') }}">Forgot Your Password?</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
