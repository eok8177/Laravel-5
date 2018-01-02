@extends('admin.layout')

@section('content')
<h1 class="page-header">@lang('message.lpz')</h1>

<a href="{{ route('admin.lpz.create') }}" class="btn fa fa-plus"> @lang('message.create')</a>

<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>id</th>
        <th>@lang('message.actions')</th>
        <th>@lang('message.name')</th>
      </tr>
    </thead>
    @foreach($items as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>
          {{-- <a href="{{ route('admin.lpz.show', ['id'=>$item->id]) }}" class="btn fa fa-eye"></a> --}}
          <a href="{{ route('admin.lpz.edit', ['id'=>$item->id]) }}" class="btn fa fa-pencil"></a>
          {{-- <a href="{{ route('admin.lpz.destroy', ['id'=>$item->id]) }}" class="btn fa fa-trash-o delete"></a> --}}
        </td>
        <td>{{$item->name}}</td>
      </tr>
    @endforeach
  </table>
</div>

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