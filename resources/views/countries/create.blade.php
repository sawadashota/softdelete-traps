@extends('layouts.app')

@section('content')
<div class="row">
  <form action="{{ route('countries.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="name">Country Name (Unique)</label>
      <input type="text" class="form-control" id="name" placeholder="Country Name" name="name" value="{{ old('name') }}">
      @if($errors->first('name'))
        <small class="form-text text-muted error">{{ $errors->first('name') }}</small>
      @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection