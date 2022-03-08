@extends('layout.index')
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="card-header">
        <h3>Login</h3>
      </div>
      <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
          @error('name')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label>Gender</label>
          <div class="custom-control custom-radio">
            <input type="radio" name="gender" id="male" class="custom-control-input" value="male">
            <label for="male" class="custom-control-label">Male</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" name="gender" id="female" class="custom-control-input" value="female">
            <label for="female" class="custom-control-label">Female</label>
          </div>
          @error('gender')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="dob">Date of birth</label>
          <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" id="dob">
          @error('dob')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="pob">Place of birth</label>
          <input type="text" name="pob" id="pob" class="form-control @error('pob') is-invalid @enderror">
          @error('pob')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror">
          @error('address')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror">
          @error('phone')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
          @error('email')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
          @error('password')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="password_confirmation">Confirm password</label>
          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
          @error('password_confirmation')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
        <label for="photo">Profile picture</label>
          <div class="custom-file">
            <input type="file" name="photo" id="photo" class="custom-file-input">
            <label for="photo" class="custom-file-label" accept="image/*" id="photo-label">Choose a profile picture</label>
            <div class="app-image">
              <img id="image">
            </div>
          </div>
        </div>
        <button class="btn btn-primary">Register</button>
      </form>
    </div>
  </div>
@endsection