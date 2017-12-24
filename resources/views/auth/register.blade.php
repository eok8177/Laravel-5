@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-auto m-auto">
      <div class="card mt-5">
        <div class="card-heading text-center">Register</div>

        <div class="card-body">
          <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="login">Login</label>

              <input id="login" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

              @if ($errors->has('username'))
              <div class="invalid-feedback">{{ $errors->first('username') }}</div>
              @endif
            </div>

            <div class="form-group">
              <label for="name">Name</label>

              @if(!empty($name))
              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$name}}" required autofocus>
              @else
              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
              @endif


              @if ($errors->has('username'))
              <div class="invalid-feedback">{{ $errors->first('username') }}</div>
              @endif
            </div>

            <div class="form-group">
              <label for="email">E-Mail Address</label>

              @if(!empty($email))
              <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$email}}" required autofocus>
              @else
              <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
              @endif

              @if ($errors->has('email'))
              <div class="invalid-feedback">{{ $errors->first('email') }}</div>
              @endif
            </div>

            <div class="form-group">
              <label for="password">Password</label>

              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

              @if ($errors->has('password'))
              <div class="invalid-feedback">{{ $errors->first('password') }}</div>
              @endif
            </div>

            <div class="form-group">
              <label for="password-confirm">Confirm Password</label>

              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
