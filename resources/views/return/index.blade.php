@extends('layout.index')
@section('content')
@if(Session::get('message') !== null)
  <div class="alert alert-success alert-dimissible fade show">
    <span>{{ Session::get('message') }}</span>
    <button class="close" data-dismiss="alert">&times;</button>
  </div>
@endif
<div class="card">
  <div class="card-body">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h3>All returns</h3>
      <a href="{{ route('return.create') }}" class="btn btn-primary">New return</a>
    </div>
    <table class="table table-dark table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Student</th>
          <th>Book</th>
          <th>Librarian</th>
          <th>Return date</th>
          <th>Remark</th>
        </tr>
      </thead>
      <tbody>
        @foreach($returns as $return)
          <tr>
            <td>
              <a href="{{ route('return.show', $return) }}" class="card-link">{{ $return->id }}</a>
            </td>
            <td>
              <a href="{{ route('student.show', $return->student) }}" class="card-link">{{ $return->student->name }}</a>
            </td>
            <td>
              <a href="{{ route('book.show', $return->book) }}" class="card-link">{{ $return->book->title }}</a>
            </td>
            <td>{{ $return->user->name }}</td>
            <td>{{ $return->return_date }}</td>
            <td>{{ $return->remark }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection