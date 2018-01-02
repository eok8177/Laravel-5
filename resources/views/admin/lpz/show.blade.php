@extends('admin.layout')

@section('content')
<h1 class="page-header">@lang('message.lpz')</h1>

<h3>{{$lpz->name}}</h3>

<p>{{$lpz->description}}</p>

@endsection

@section('scripts')
<script>
  $(function () {

  });
</script>
@endsection