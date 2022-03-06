@extends('layout.index')
@section('content')
<div class="card">
  <div class="card-body">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h3>Edit student</h3>
      <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    </div>
    <form action="{{ route('student.update', $student) }}" method="post">
      @csrf
      @method('PUT')
      @include('student.form')
      <button class="btn btn-primary">Update</button>
    </form>
  </div>
</div>
@endsection