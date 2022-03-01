@extends('layout.index')
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="card-header">
        <h3>Login</h3>
      </div>
      <form action="" method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label>Gender</label>
          <div class="custom-control custom-radio">
            <input type="radio" name="gender" id="male" class="custom-control-input">
            <label for="male" class="custom-control-label">Male</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" name="gender" id="female" class="custom-control-input">
            <label for="female" class="custom-control-label">Female</label>
          </div>
        </div>
        <div class="form-group">
          <label for="dob">Date of birth</label>
          <input type="date" name="dob" class="form-control" id="dob">
        </div>
        <div class="form-group">
          <label for="pob">Place of birth</label>
          <input type="text" name="pob" id="pob" class="form-control">
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" name="address" id="address" class="form-control">
        </div>
        <div class="form-group">
          <label for="phone">Address</label>
          <input type="tel" name="phone" id="phone" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
          <label for="password_confirmation">Confirm password</label>
          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>
        <button class="btn btn-primary">Register</button>
      </form>
    </div>
  </div>
@endsection