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
            <th>Authors</th>
            <th>Book source</th>
            <th>Book type</th>
            <th>Remark</th>
          </tr>
        </thead>
        <tbody>
          @foreach($books as $book)
            <tr>
              <td>
                <a href="{{ route('book.show', $book) }}" class="card-link">{{ $book->id }}</a>
              </td>
              <td>{{ $book->title }}</td>
              <td>{{ $book->publish_date }}</td>
              <td>{{ $book->num_of_pages }}</td>
              <td>{{ $book->num_copies}}</td>
              <td>{{ $book->edition }}</td>
              <td>{{ $book->publisher }}</td>
              <td>
                <div class="dropdown">
                  <span style="cursor: pointer;" class="dropdown-toggle" data-toggle="dropdown">Authors</span>
                  <div class="dropdown-menu">
                    @foreach($book->authors as $author)
                      <a href="{{ route('author.show', $author) }}" class="dropdown-item">
                        {{ $author->name }}
                      </a>
                    @endforeach
                  </div>
                </div>
              </td>
              <td>{{ $book->book_source }}</td>
              <td>{{ $book->bookType->name }}</td>
              <td>{{ $book->remark }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection