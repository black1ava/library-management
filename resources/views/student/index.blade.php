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
      <h3>All students</h3>
      <a href="{{ route('student.create') }}" class="btn btn-primary">New student</a>
    </div>
    <table class="table table-dark table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Gender</th>
          <th>Date of birth</th>
          <th>Place of birth</th>
          <th>Address</th>
          <th>Phone</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        @foreach($students as $student)
          <tr>
            <td>
              <a href="{{ route('student.show', $student) }}" class="card-link">{{ $student->id }}</a>
            </td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->gender }}</td>
            <td>{{ $student->dob }}</td>
            <td>{{ $student->pob }}</td>
            <td>{{ $student->address }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->email }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection