@extends('admin.layout')

@section('content')
<h2 class="page-header">@lang('message.users')</h2>

<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">@lang('message.actions')</th>
        <th scope="col">@lang('message.username')</th>
        <th scope="col">@lang('message.name')</th>
        <th scope="col">@lang('message.email')</th>
      </tr>
    </thead>
    @foreach($users as $user)
      <tr>
        <td>
          <a href="{{ route('admin.user.edit',    ['id'=>$user->id]) }}" class="btn fa fa-pencil"></a>
          <a href="{{ route('admin.user.destroy', ['id'=>$user->id]) }}" class="btn fa fa-trash-o delete"></a>
        </td>
        <td>{{$user->username}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
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
      if (!confirm('Are you sure you want to delete?')) return;
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