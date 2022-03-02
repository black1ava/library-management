@extends('layout.index')
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h3>All book types</h3>
        <a href="{{ route('book_type.create') }}" class="btn btn-primary">New book type</a>
      </div>
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
@endsection