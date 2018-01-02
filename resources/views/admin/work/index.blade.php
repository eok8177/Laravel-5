@extends('admin.layout')

@section('content')
<h4>@lang('message.work')</h4>

<a href="{{ route('admin.work.create') }}" class="btn fa fa-plus"> @lang('message.create')</a>

<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>@lang('message.date')</th>
        <th>@lang('message.actions')</th>
        <th>@lang('message.description')</th>
        <th>@lang('message.lpz')</th>
        <th>@lang('message.category')</th>
        <th>@lang('message.invoice')</th>
        <th>@lang('message.summ')</th>
      </tr>
    </thead>
    @foreach($items as $item)
      <tr>
        <td>{{ $item->created_at->format('d.m.y') }}</td>
        <td>
          {{-- <a href="{{ route('admin.work.show',    ['id'=>$item->id]) }}" class="btn fa fa-eye"></a> --}}
          <a href="{{ route('admin.work.edit',    ['id'=>$item->id]) }}" class="btn fa fa-pencil"></a>
          <a href="{{ route('admin.work.destroy', ['id'=>$item->id]) }}" class="btn fa fa-trash-o delete"></a>
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

{{ $items->links() }}
<a href="#wrapper" class="btn btn-default pull-right"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>


@endsection

@section('scripts')
  <script>
  $(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $('.delete').on('click', function (e) {
      if (!confirm('Are you sure you want to delete?')) return false;
    e.preventDefault();
      $.post({
          type: 'DELETE',  // destroy Method
          url: $(this).attr("href")
      }).done(function (data) {
          console.log(data);
          location.reload(true);
      });
    });
  });
</script>
@endsection