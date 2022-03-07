<div class="form-group">
  <label for="student_id">Student</label>
  <select name="student_id" id="student_Id" class="custom-select @error('student_id') is-invalid @enderror">
    <option value="">Please select a student</option>
    @foreach($students as $student)
      <option value="{{ $student->id }}" @if(isset($return) && $return->student->id === $student->id) selected @endif>{{ $student->name }}</option>
    @endforeach
  </select>
  @error('student_id')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="form-group">
  <label for="book_id">Book</label>
  <select name="book_id" id="book_id" class="custom-select @error('book_id') is-invalid @enderror">
    <option value="">Please select a book</option>
    @foreach($books as $book)
      <option value="{{ $book->id }}" @if(isset($return) && $return->book->id === $book->id) selected @endif>{{ $book->title }}</option>
    @endforeach
  </select>
  @error('book_id')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="form-group">
  <label for="return_date">Return date</label>
  <input type="date" name="return_date" id="return_date" value="{{ $return->return_date ?? '' }}" class="form-control @error('return_date') is-invalid @enderror">
  @error('return_date')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="form-group">
  <label for="Remark">Remark</label>
  <textarea name="remark" id="remark" cols="30" rows="10" class="form-control">{{ $return->remark ?? '' }}</textarea>
</div>