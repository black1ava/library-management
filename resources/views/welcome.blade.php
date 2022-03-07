@extends('layout.index')
@section('content')
<div class="card">
  <div class="card-body">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <div class="card-header">
                <h4><a href="{{ route('author.index') }}" class="card-link">Author</a></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <div class="card-header">
                <h4><a href="{{ route('book_type.index') }}" class="card-link">Book type</a></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <div class="card-header">
                <h4><a href="{{ route('book.index') }}" class="card-link">Book</a></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <div class="card-header">
                <h4><a href="{{ route('student.index') }}" class="card-link">Student</a></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <div class="card-header">
                <h4><a href="{{ route('borrow.index') }}" class="card-link">Borrow</a></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <div class="card-header">
                <h4><a href="{{ route('return.index') }}" class="card-link">Return</a></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection