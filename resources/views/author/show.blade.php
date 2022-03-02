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
      <a href="{{ route('author.destroy', $author) }}" class="btn btn btn-danger" onclick="event.preventDefault();" data-toggle="modal" data-target="#delete-modal">
        Destroy
      </a>
      <div class="modal fade" id="delete-modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Are you sure you wanto to delete this author?</h4>
            </div>
            <div class="modal-body">
              <p>After you perform this action, this author will be deleted permanently.</p>
            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete').submit();">Yes</button>
              <button class="btn btn-secondary" data-dismiss="modal">No</button>
              <form action="{{ route('author.destroy', $author) }}" method="post" id="delete">
                @csrf
                @method('delete')
              </form>
            </div>
          </div>
        </div>
      </div>
      <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    </div>
  </div>
@endsection