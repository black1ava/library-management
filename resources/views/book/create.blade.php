@extends('layout.index')
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h3>New book</h3>
        <a href="{{ url()->previous() }}" class="btn btn btn-secondary">Back</a>
      </div>
      <form action="{{ route('book.store') }}" method="post">
        @csrf
        @include('book.form')
        <button class="btn btn-primary">Create book</button>
      </form>
    </div>
  </div>
@endsection