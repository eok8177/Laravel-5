@extends('admin.layout')

@section('content')
<h5>@lang('message.work')</h5>

<a href="{{ route('admin.work.create') }}" class="btn fa fa-plus"> @lang('message.create')</a>

<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>@lang('message.date')</th>
        <th>Action</th>
        <th>@lang('message.description')</th>
        <th>@lang('message.lpz')</th>
        <th>@lang('message.category')</th>
        <th>@lang('message.invoice')</th>
        <th>@lang('message.summ')</th>
      </tr>
    </thead>
    @foreach($works as $item)
      <tr>
        <td>{{ $item->created_at->format('d.m.y') }}</td>
        <td>
          <a href="{{ route('admin.work.edit', ['id'=>$item->id]) }}" class="btn fa fa-pencil"></a>
        </td>
        <td>{{$item->description}}</td>
        <td>{{$item->lpz->name}}</td>
        <td>{{$item->cat->name}}</td>
        <td>{{$item->invoice}}</td>
        <td>{{$item->summ}}</td>
      </tr>
    @endforeach
  </table>
</div>

{{ $works->links('vendor.pagination.bootstrap-4') }}
<a href="#app" class="btn btn-info pull-right"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
@endsection
