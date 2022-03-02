@extends('layout.index')
@section('content')
  @if(Session::get('message') !== null)
  <div class="alert alert-success alert-dismissible fade show">
      <span>{{ Session::get('message')}}</span>
      <button class="close" data-dismiss="alert">&times;</button>
    </div>
  @endif
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
        <tbody>
          @foreach($bookTypes as $bookType)
          <tr>
            <td>
              <a href="{{ route('book_type.show', $bookType) }}" class="card-link">
                {{ $bookType->id }}
              </a>
            </td>
            <td>{{ $bookType->name }}</td>
            <td>{{ $bookType->description }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection