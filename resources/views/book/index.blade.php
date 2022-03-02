@extends('layout.index')
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h3>All tables</h3>
        <a href="{{ route('book.create') }}" class="btn btn-primary">New book</a>
      </div>
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Publish date</th>
            <th>Number of pages</th>
            <th>Number copies</th>
            <th>Edition</th>
            <th>Publisher</th>
            <th>Book source</th>
            <th>Book type</th>
            <th>Remark</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
@endsection