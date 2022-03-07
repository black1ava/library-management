@extends('layout.index')
@section('content')
<div class="card">
  <div class="card-body">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h3>New return</h3>
      <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    </div>
    <form action="{{ route('return.store') }}" method="post">
      @csrf
      @include('return.form')
      <button class="btn btn-primary">Create</button>
    </form>
  </div>
</div>
@endsection