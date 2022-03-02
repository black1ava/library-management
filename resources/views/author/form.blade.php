<div class="form-group">
  <label for="name">Name</label>
  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $author->name ?? '' }}">
  @error('name')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="form-group">
  <label>Gender</label>
  <div class="custom-control custom-radio">
    <input type="radio" name="gender" id="male" value="male" @if(isset($author) && $author->gender === 'male') checked @endif class="custom-control-input">
    <label for="male" class="custom-control-label">Male</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" name="gender" id="female" value="female" @if(isset($author) && $author->gender === 'female') checked @endif class="custom-control-input">
    <label for="female" class="custom-control-label">Female</label>
  </div>
  @error('gender')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="form-group">
  <label for="dob">Date of birth</label>
  <input type="date" name="dob" id="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ $author->dob ?? '' }}">
  @error('dob')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="form-group">
  <label for="pob">Place of birth</label>
  <input type="text" name="pob" id="pob" class="form-control @error('pob') is-invalid @enderror" value="{{ $author->pob ?? '' }}">
  @error('pob')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="form-group">
  <label for="address">Current Address</label>
  <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ $author->address ?? '' }}">
  @error('address')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="form-group">
  <label for="phone">Phone</label>
  <input type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $author->phone ?? '' }}">
  @error('phone')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="form-group">
  <label for="email">Email</label>
  <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $author->email ?? '' }}">
  @error('email')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="form-group">
  <label>Profile photo</label>
  <div class="custom-file">
    <input type="file" name="photo" id="photo" accept="image/*" class="custom-file-input">
    <label for="photo" id="photo-label" class="custom-file-label"></label>
  </div>
</div>
<div class="app-image">
  <img src="{{ isset($author->photo) ? '/images/'.$author->photo : '' }}" id="image">
</div>
<script src="/assets/js/image.js"></script>