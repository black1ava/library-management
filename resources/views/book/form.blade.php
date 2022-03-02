<div class="form-group">
  <label for="title">Title</label>
  <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
  @error('title')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="form-group">
  <label for="publish_date">Publish date</label>
  <input type="date" name="publish_date" id="publish_date" class="form-control @error('publish_date') is-invalid @enderror">
  @error('publish_date')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="form-group">
  <label for="num_of_pages">Number of pages</label>
  <input type="number" name="num_of_pages" id="num_of_pages" class="form-control @error('num_of_pages') is-invalid @enderror">
  @error('num_of_pages')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="form-group">
  <label for="num_copies">Number copies</label>
  <input type="number" name="num_copies" id="num_copies" class="form-control @error('num_copies') is-invalid @enderror">
  @error('num_copies')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="form-group">
  <label for="edition">Edition</label>
  <input type="number" name="edition" id="edition" class="form-control @error('edition') is-invalid @enderror">
  @error('edition')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="form-group">
  <label for="publisher">Publisher</label>
  <input type="text" name="publisher" id="publisher" class="form-control @error('publisher') is-invalid @enderror">
  @error('publisher')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="form-group">
  <label for="book_source">Book source</label>
  <input type="text" name="book_source" id="book_source" class="form-control @error('book_source') is-invalid @enderror">
  @error('book_source')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="form-group">
  <label for="book_type_id">Book type</label>
  <select name="book_type_id" id="book_type_id" class="custom-select @error('book_type') is-invalid @enderror">
    <option value="">Please select book type</option>
    @foreach($bookTypes as $bookType)
      <option value="{{ $bookType->id }}">{{ $bookType->name }}</option>
    @endforeach
  </select>
  @error('book_type_id')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="form-group">
  <label>Authors</label>
  @foreach($authors as $author)
    <div class="custom-control custom-checkbox">
      <input type="checkbox" name="authors[]" id="{{ $author->id }}" value="{{ $author->id }}" class="custom-control-input">
      <label for="{{ $author->id }}" class="custom-control-label">{{ $author->name }}</label>
    </div>
  @endforeach
  @error('authors')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="form-group">
  <label for="Remark">Remark</label>
  <textarea name="remark" class="form-control" id="remark" cols="30" rows="10"></textarea>
</div>