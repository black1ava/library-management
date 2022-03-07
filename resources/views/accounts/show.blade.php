@extends('layout.index')
@section('content')
  @if(Session::get('message') !== null)
    <div class="alert alert-success alert-dismissible fade show">
      <span>{{ Session::get('message') }}</span>
      <button class="close" data-dismiss="alert">&times;</button>
    </div>
  @endif
  <div class="card">
    <div class="card-body">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Edit account</h3>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
      </div>
      <form action="{{ route('account.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
          @error('name')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label>Gender</label>
          <div class="custom-control custom-radio">
            <input type="radio" name="gender" id="male" class="custom-control-input" value="male" @if($user->gender === 'male') checked @endif>
            <label for="male" class="custom-control-label">Male</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" name="gender" id="female" class="custom-control-input" value="female" @if($user->gender === 'female') checked @endif>
            <label for="female" class="custom-control-label">Female</label>
          </div>
          @error('gender')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="dob">Date of birth</label>
          <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" id="dob" value="{{ $user->dob }}">
          @error('dob')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="pob">Place of birth</label>
          <input type="text" name="pob" id="pob" class="form-control @error('pob') is-invalid @enderror" value="{{ $user->pob }}">
          @error('pob')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ $user->address }}">
          @error('address')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $user->phone }}">
          @error('phone')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
          @error('email')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="photo">Profile picture</label>
          <div class="custom-file">
            <input type="file" name="photo" id="photo" class="custom-file-input">
            <label for="photo" class="custom-file-label" accept="image/*" id="photo-label">Choose a profile picture</label>
            <div class="app-image">
              <img src="/images/{{ $user->photo }}" id="image">
            </div>
          </div>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('account.destroy', Auth::user()->id) }}" onclick="event.preventDefault();" class="btn btn-danger" data-toggle="modal" data-target="#delete-account">Delete</a>
      </form>
      <div class="modal fade" id="delete-account">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-content">
              <div class="modal-header">
                <h4>Are you sure you want to delete this account?</h4>
              </div>
              <div class="modal-body">
                <p>After performing this action, this account will be deleted permanently.</p>
              </div>
              <div class="modal-footer">
                <button class="btn btn-danger" onclick="document.getElementById('delete').submit();">Yes</button>
                <button class="btn btn-primary" data-dismiss="modal">No</button>
                <form action="{{ route('account.destroy', Auth::user()->id) }}" method="post" id="delete">
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