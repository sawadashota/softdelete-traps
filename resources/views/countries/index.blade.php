@extends('layouts.app')

@section('content')
  <div class="row">
    <h4>Countries</h4>
    <table class="table">
      <thead class="thead-inverse">
      <tr>
        <th>#</th>
        <th>Country</th>
        <th>User</th>
        <th>Post</th>
        <th></th>
      </tr>
      </thead>
      <tbody>
      @foreach($countries as $country)
        <tr>
          <td>{{ $country->id }}</td>
          <td>{{ $country->name }}</td>
          <td>{!! $country->users->pluck('email')->implode('<br>') !!}</td>
          <td>{!! $country->posts->pluck('title')->implode('<br>') !!}</td>
          <td>
            <form action="{{ route('countries.destroy', ['country' => $country]) }}" method="POST">
              {{ csrf_field() }}
              <input name="_method" type="hidden" value="DELETE">
              <input type="submit" class="btn btn-danger" value="Delete">
            </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>

  <div class="row">
    <h4>Users</h4>
    <table class="table">
      <thead class="thead-inverse">
      <tr>
        <th>#</th>
        <th>User</th>
        <th>Post</th>
        <th>Belong Country</th>
      </tr>
      </thead>
      <tbody>
      @foreach($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->email }}</td>
          <td>{!! $user->posts->pluck('title')->implode('<br>') !!}</td>
          <td>
            {!! $user->country->name or "<em class='deleted'>Parent has already deleted.</em>" !!}
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>

  <div class="row">
    <h4>Posts</h4>
    <table class="table">
      <thead class="thead-inverse">
      <tr>
        <th>#</th>
        <th>Post</th>
        <th>Belong User</th>
        <th>Belong Country</th>
      </tr>
      </thead>
      <tbody>
      @foreach($posts as $post)
        <tr>
          <td>{{ $post->id }}</td>
          <td>{{ $post->title }}</td>
          <td>
            {!! $post->user->email or "<em class='deleted'>Parent has already deleted.</em>" !!}
          </td>
          <td>
            {!! $post->user->country->name or "<em class='deleted'>Parent has already deleted.</em>" !!}
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>

@endsection