@extends('layout.index')
@section('content')
<div class="card">
  <div class="card-body">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h3>Return book: <strong><a href="{{ route('book.show', $return->book) }}" class="card-link">{{ $return->book->title }}</a></strong></h3>
      <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    </div>
    <ul class="list-group">
      <li class="list-group-item">
        ID <strong>{{ $return->id }}</strong>
      </li>
      <li class="list-group-item">
        Student <strong><a href="{{ route('student.show', $return->student) }}" class="card-link">{{ $return->student->name }}</a></strong>
      </li>
      <li class="list-group-item">
        Librarian <strong>{{ $return->user->name }}</strong>
      </li>
      <li class="list-group-item">
        Return date <strong>{{ $return->return_date }}</strong>
      </li>
      <li class="list-group-item">
        Remark <strong>{{ $return->remark }}</strong>
      </li>
    </ul>
    <div class="card-footer">
      <a href="{{ route('return.edit', $return) }}" class="btn btn-primary">Edit</a>
      <a href="{{ route('return.destroy', $return) }}" class="btn btn-danger">Delete</a>
    </div>
  </div>
</div>
@endsection