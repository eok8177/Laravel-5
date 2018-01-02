<div class="form-group">
  {!! Form::label('name', Lang::get('message.name'), ['class' => 'control-label']) !!}
  {!! Form::text('name', $lpz->name, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('description', Lang::get('message.description'), ['class' => 'control-label']) !!}
  {!! Form::textarea('description', $lpz->description, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::submit(Lang::get('message.save')) !!}
</div>
