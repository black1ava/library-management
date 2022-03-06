@extends('layout.index')
@section('content')
<div class="card">
  <div class="card-body">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h3>{{ $book->title }}</h3>
      <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    </div>
    <ul class="list-group">
      <li class="list-group-item">ID: <strong>{{ $book->id }}</strong></li>
      <li class="list-group-item">Publish date: <strong>{{ $book->publish_date }}</strong></li>
      <li class="list-group-item">Number of pages: <strong>{{ $book->num_of_pages }} pages</strong></li>
      <li class="list-group-item">Number of copies: <strong>{{ $book->num_copies }} copies</strong></li>
      <li class="list-group-item">Edition: <strong>{{ $book->edition }}</strong></li>
      <li class="list-group-item">Publisher: <strong>{{ $book->publisher }}</strong></li>
      <li class="list-group-item">
        Authors: 
        @foreach($book->authors as $author)
          <strong><a href="{{ route('author.show', $author) }}" class="card-link">{{ $author->name }}</a></strong>
        @endforeach
      </li>
      <li class="list-group-item">Book source: <strong>{{ $book->book_source }}</strong></li>
      <li class="list-group-item">Book type: <strong><a href="{{ route('book_type.show', $book->bookType) }}" class="card-link">{{ $book->bookType->name }}</a></strong></li>
      <li class="list-group-item">Remark: <strong>{{ $book->remark }}</strong></li>
    </ul>
    <br>
    <a href="{{ route('book.edit', $book) }}" class="btn btn-primary">Edit</a>
    <a href="{{ route('book.destroy', $book) }}" onclick="event.preventDefault();" class="btn btn-danger" data-toggle="modal" data-target="#delete-book">Delete</a>
    <div class="modal fade" id="delete-book">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4>Are you sure you want to delete this book?</h4>
          </div>
          <div class="modal-body">
            <p>After performing this action, this book will be delete permanently.</p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete').submit();">Yes</button>
            <button class="btn btn-primary" data-dismiss="modal">No</button>
            <form action="{{ route('book.destroy', $book) }}" id="delete" method="post">
              @csrf
              @method('DELETE')
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection