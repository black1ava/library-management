@extends('layout.index')
@section('content')
@if(Session::get('message') !== null)
  <div class="alert alert-dismissible alert-success fade show">
    <span>{{ Session::get('message') }}</span>
    <button class="close" data-dismiss="alert">&times;</button>
  </div>
@endif
<div class="card">
  <div class="card-body">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h3>All borrows</h3>
      <a href="{{ route('borrow.create') }}" class="btn btn-primary">New borrow</a>
    </div>
    <table class="table table-striped table-dark">
      <thead>
        <tr>
          <th>ID</th>
          <th>Student</th>
          <th>Book</th>
          <th>Librarian</th>
          <th>Borrow date</th>
          <th>Return date</th>
          <th>Remark</th>
        </tr>
      </thead>
      <tbody>
        @foreach($borrows as $borrow)
          <tr>
            <td>
              <a href="{{ route('borrow.show', $borrow) }}" class="card-link">
                {{ $borrow->id }}
              </a>
            </td>
            <td>
              <a href="{{ route('student.show', $borrow->student) }}" class="card-link">
                {{ $borrow->student->name }}
              </a>
            </td>
            <td>
              <a href="{{ route('book.show', $borrow->book) }}" class="card-link">
                {{ $borrow->book->title }}
              </a>
            </td>
            <td>{{ $borrow->user->name }}</td>
            <td>{{ $borrow->borrow_date }}</td>
            <td>{{ $borrow->return_date }}</td>
            <td>{{ $borrow->remark }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection