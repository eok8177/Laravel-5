@extends('admin.layout')

@section('content')
<h1 class="page-header">@lang('message.work')</h1>

{!! Form::model($work, ['route' => ['admin.work.update', $work->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
  @include('admin.work.form')
{!! Form::close() !!}

@endsection

@section('scripts')
<script>
  $(function () {

  });
</script>
@endsection