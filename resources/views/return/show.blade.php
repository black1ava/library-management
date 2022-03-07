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
      <a href="{{ route('return.destroy', $return) }}" onclick="event.preventDefault()" data-toggle="modal" data-target="#delete-return" class="btn btn-danger">Delete</a>
      <div class="modal fade" id="delete-return">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4>Are you sure you want to delete this record?</h4>
            </div>
            <div class="modal-body">
              <p>After performing this action, this record will be deleteed permanently.</p>
            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" onclick="document.getElementById('delete').submit();">Yes</button>
              <button class="btn btn-primary" data-dismiss="modal">No</button>
              <form action="{{ route('return.destroy', $return) }}" method="post" id="delete">
                @csrf
                @method('DELETE')
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection