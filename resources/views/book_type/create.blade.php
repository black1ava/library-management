@extends('layout.index')
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h3>New book type</h3>
        <a href="{{ url()->previous() }}" class="btn btn btn-secondary">Back</a>
      </div>
      <form action="{{ route('book_type.store') }}" method="post">
        @csrf
        @include('book_type.form')
        <button class="btn btn-primary">Create book type</button>
      </form>
    </div>
  </div>
@endsection