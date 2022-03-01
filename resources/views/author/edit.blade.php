@extends('layout.index')
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="card-header">
        <h3>Edit author</h3>
      </div>
      <form action="{{ route('author.update', $author) }}" method="post">
        @csrf
        @method('put')
        @include('author.form')
        <button class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
@endsection