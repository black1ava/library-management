@extends('layout.index')
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Borrow book: <strong><a href="{{ route('book.show', $borrow->book) }}" class="card-link">{{ $borrow->book->title }}</a></strong></h3>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
      </div>
      <ul class="list-group">
        <li class="list-group-item">
          ID: <strong>{{ $borrow->id }}</strong>
        </li>
        <li class="list-group-item">
          Student name: <strong><a href="{{ route('student.show', $borrow->student) }}" class="card-link">{{ $borrow->student->name }}</a></strong>
        </li>
        <li class="list-group-item">
          Librarian name: <strong>{{ $borrow->user->name }}</strong>
        </li>
        <li class="list-group-item">
          Borrow date: <strong>{{ $borrow->borrow_date }}</strong>
        </li>
        <li class="list-group-item">
          Return date: <strong>{{ $borrow->return_date }}</strong>
        </li>
      </ul>
      <div class="card-footer">
        <a href="{{ route('borrow.edit', $borrow) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('borrow.destroy', $borrow) }}" onclick="event.preventDefault();" data-toggle="modal" data-target="#delete-borrow" class="btn btn-danger">Delete</a>
        <div class="modal fade" id="delete-borrow">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4>Are you sure you want to delete this borrow record?</h4>
              </div>
              <div class="modal-body">
                <p>After performing this action, this record will be deleted permanently.</p>
              </div>
              <div class="modal-footer">
                <button class="btn btn-danger" onclick="document.getElementById('delete').submit();">Yes</button>
                <button class="btn btn-primary" data-dismiss="modal">No</button>
                <form action="{{ route('borrow.destroy', $borrow) }}" method="post" id="delete">
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