@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-auto m-auto">
      <div class="card mt-5">
        <div class="card-heading text-center">Reset Password</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif

          <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="email">E-Mail Address</label>

              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

              @if ($errors->has('email'))
              <div class="invalid-feedback">{{ $errors->first('email') }}</div>
              @endif
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
