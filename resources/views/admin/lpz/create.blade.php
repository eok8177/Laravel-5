@extends('admin.layout')

@section('content')
<h1 class="page-header">@lang('message.lpz')</h1>

{!! Form::open(['route' => ['admin.lpz.store'], 'method' => 'POST', 'class' => 'form-horizontal']) !!}
  @include('admin.lpz.form')
{!! Form::close() !!}

@endsection

@section('scripts')
<script>
  $(function () {

  });
</script>
@endsection