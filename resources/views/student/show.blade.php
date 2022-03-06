@extends('layout.index')
@section('content')
<div class="card">
  <div class="card-body">
    <div class="card-header app-image">
      <img class="card-image-top" id="image" src="/images/{{ $student->photo }}">
    </div>
    <ul class="list-group">
      <li class="list-group-item">ID <strong>{{ $student->id }}</strong></li>
      <li class="list-group-item">Name <strong>{{ $student->name }}</strong></li>
      <li class="list-group-item">Gender <strong>{{ $student->gender }}</strong></li>
      <li class="list-group-item">Date of birth <strong>{{ $student->dob }}</strong></li>
      <li class="list-group-item">Place of birth <strong>{{ $student->pob }}</strong></li>
      <li class="list-group-item">Current Address <strong>{{ $student->address }}</strong></li>
      <li class="list-group-item">Phone <strong>{{ $student->phone }}</strong></li>
      <li class="list-group-item">Email <strong>{{ $student->email }}</strong></li>
    </ul>
    <div class="card-footer">
      <a href="{{ route('student.edit', $student) }}" class="btn btn-primary">Edit</a>
      <a href="{{ route('student.destroy', $student) }}" class="btn btn-danger" data-toggle="modal" data-target="#delete-student">Delete</a>
      <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
      <div class="modal fade" id="delete-student">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4>Are you sure you want to delete this student?</h4>
            </div>
            <div class="modal-body">
              <p>After performing this action, this student will be deleted permannetly.</p>
            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete').submit();">Yes</button>
              <button class="btn btn-primary" data-dismiss="modal">No</button>
              <form action="{{ route('student.destroy', $student) }}" method="post" id="delete">
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