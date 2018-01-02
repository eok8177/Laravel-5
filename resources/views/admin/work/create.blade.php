@extends('admin.layout')

@section('content')
<h1 class="page-header">@lang('message.work')</h1>

{!! Form::open(['route' => ['admin.work.store'], 'method' => 'POST', 'class' => 'form-horizontal']) !!}
  @include('admin.work.form')
{!! Form::close() !!}

@endsection

@section('scripts')
<script>
  $(function () {

  });
</script>
@endsection