@extends('layout.index')
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="card-header app-image">
        <img src="/images/{{ $author->photo }}" alt="" class="card-img-top" id="image">
      </div>
      <ul class="list-group">
        <li class="list-group-item">
          Name: <strong>{{ $author->name }}</strong>
        </li>
        <li class="list-group-item">
          Gender: <strong>{{ $author->gender }}</strong>
        </li>
        <li class="list-group-item">
          Date of birth: <strong>{{ $author->dob }}</strong>
        </li>
        <li class="list-group-item">
          Placeof birth: <strong>{{ $author->pob }}</strong>
        </li>
        <li class="list-group-item">
          Address: <strong>{{ $author->address }}</strong>
        </li>
        <li class="list-group-item">
          Phone: <strong>{{ $author->phone }}</strong>
        </li>
        <li class="list-group-item">
          Email: <strong>{{ $author->email }}</strong>
        </li>
      </ul>
      <a href="{{ route('author.edit', $author) }}" class="btn btn-primary">Edit</a>
      <a href="{{ route('author.destroy', $author) }}" class="btn btn btn-danger">Destroy</a>
      <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    </div>
  </div>
@endsection