@extends('layout.index')
@section('content')
<div class="card">
  <div class="card-body">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4>Edit return</h4>
      <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    </div>
    <form action="{{ route('return.update', $return) }}" method="post">
      @csrf
      @method('PUT')
      @include('return.form')
      <button class="btn btn-primary">Update</button>
    </form>
  </div>
</div>
@endsection