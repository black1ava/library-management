<div class="form-group">
  <label for="name">Name</label>
  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"value="{{ $bookType->name ?? '' }}">
  @error('name')
    <smalll class="text-danger">{{ $message }}</smalll>
  @enderror
</div>
<div class="form-group">
  <label for="description">Description</label>
  <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $bookType->description ?? '' }}</textarea>
</div>