<div class="form-group">
  {!! Form::label('lpz_id', Lang::get('message.lpz'), ['class' => 'control-label']) !!}
    {!! Form::select('lpz_id', $lpz, $work->lpz_id, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('cat_id', Lang::get('message.category'), ['class' => 'control-label']) !!}
    {!! Form::select('cat_id', $cat, $work->cat_id, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('invoice', Lang::get('message.invoice'), ['class' => 'control-label']) !!}
    {!! Form::text('invoice', $work->invoice, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('summ', Lang::get('message.summ'), ['class' => 'control-label']) !!}
    {!! Form::text('summ', $work->summ, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('description', Lang::get('message.description'), ['class' => 'control-label']) !!}
    {!! Form::textarea('description', $work->description, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::submit(Lang::get('message.save')) !!}
</div>
