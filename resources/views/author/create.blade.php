@extends('layout.index')
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h2>New author</h2>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
      </div>
      <form action="{{ route('author.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('author.form')
        <button class="btn btn-primary">Create author</button>
      </form>
    </div>
  </div>
@endsection