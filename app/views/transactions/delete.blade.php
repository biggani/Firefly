@extends('layouts.default')
@section('content')
<div class="row">
  <div class="col-lg-8">
    <h3>Delete "{{{$transaction->description}}}"</h3>

    {{Form::open()}}
    <p>
        Are you sure you want to delete "{{{$transaction->description}}}" with
        an amount of {{mf($transaction->amount,true)}}?
    </p>
    <div class="form-group">
      <button type="submit" class="btn btn-danger btn-default">YES</button>
    </div>

    {{Form::close()}}

  </div>
</div>


@stop