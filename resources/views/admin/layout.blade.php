<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('admin/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>

  <div id="app">

    {{-- Navigation --}}
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                <i class="fa fa-fw fa-tachometer"></i> <span class="d-none d-md-inline">@lang('message.dashboard')</span>
            </a>

            <ul class="nav">
              <li class="nav-item">
                <a href="/" class="nav-link"><i class="fa fa-fw fa-home"></i> <span class="d-none d-md-inline">@lang('message.to_site')</span></a>
              </li>

              <li class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <span class="d-none d-md-inline">{{ Auth::user()->name }}</span></a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a href="{{ route('admin.user.edit', ['id' => Auth::user()->id]) }}" class="dropdown-item"><i class="fa fa-fw fa-gear"></i> <span class="d-none d-md-inline">@lang('message.settings')</span></a>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </div>
              </li>

            </ul>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>

        {{-- SIDEBAR --}}
        <div class="collapse navbar-collapse " id="navbarCollapse">
          <ul class="nav side-nav">
            <li>
              <a href="#"><i class="fa fa-fw fa-picture-o"></i> @lang('message.item')</a>
            </li>

          </ul>
        </div>
    </nav>



    {{--  PAGE  --}}
    <div id="page-wrapper">
      <div class="container-fluid">

        <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has($msg))
              <p class="alert alert-{{ $msg }}">{{ Session::get($msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
          @endforeach

          @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
        </div>

        @yield('content')

      </div>{{-- /.container-fluid --}}
    </div>
  </div>

  {{--  FOOTER  --}}

<!-- Scripts -->
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
@yield('scripts')
</body>
</html>
