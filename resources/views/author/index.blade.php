@extends('layout.index')
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h3>All authors</h3>
        <a href="{{ route('author.create') }}" class="btn btn-primary">New author</a>
      </div>
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Date of birth</th>
            <th>Place of birth</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          @foreach($authors as $author)
            <tr>
              <td>
                <a href="{{ route('author.show', $author) }}" class="card-link">
                  {{ $author->id }}
                </a>
              </td>
              <td>{{ $author->name }}</td>
              <td>{{ $author->gender }}</td>
              <td>{{ $author->dob }}</td>
              <td>{{ $author->pob }}</td>
              <td>{{ $author->address }}</td>
              <td>{{ $author->phone }}</td>
              <td>{{ $author->email }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection