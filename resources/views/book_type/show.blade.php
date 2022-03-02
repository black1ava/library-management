@extends('layout.index')
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h3>{{ $bookType->name }}</h3>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
      </div>
      <p>Description: <strong>{{ $bookType->description }}</strong></p>
      <a href="{{ route('book_type.edit', $bookType) }}" class="btn btn-primary">Edit</a>
      <a href="{{ route('book_type.destroy', $bookType) }}" class="btn btn-danger" onclick="event.preventDefault();" data-toggle="modal" data-target="#delete-book-type">Delete</a>
      <div class="modal fade" id="delete-book-type">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4>Are you sure you want to delete thid book type?</h4>
            </div>
            <div class="modal-body">
              After you perform this action, this book type will be deleted permanently.
            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete').submit();">Yes</button>
              <button class="btn btn-secondary" data-dismiss="modal">No</button>
              <form action="{{ route('book_type.destroy', $bookType) }}" method="post" id="delete">
                @csrf
                @method('delete')
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection