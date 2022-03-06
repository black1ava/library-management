@extends('layout.index')
@section('content')
  @if(Session::get('message') !== null)
  <div class="alert alert-danger alert-dismissible fade show">
      <span>{{ Session::get('message')}}</span>
      <button class="close" data-dismiss="alert">&times;</button>
    </div>
  @endif
  <div class="card">
    <div class="card-body">
      <div class="card-header">
        <h3>Login</h3>
      </div>
      <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control">
        </div>
        <button class="btn btn-primary">Login</button>
      </form>
    </div>
  </div>
@endsection