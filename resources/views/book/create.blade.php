@extends('layouts.master')

@section('content')

@if (isset($message))
  <div class="alert alert-warning message-text" role="alert">
    {{$message}}
  </div>
@endif

  <form action="{{ route('book.store') }}" method="POST">
    @csrf

    <div class="row mb-3">
        <label for="author" class="col-sm-2 col-form-label">Select Author</label>
        <div class="col-sm-10">
            <select name="author" class="form-select" aria-label="Default select example" required>
                <option selected></option>
                    @foreach ($authors as $key => $value )
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
              </select>
        </div>
      </div>
    <div class="row mb-3">
      <label for="title" class="col-sm-2 col-form-label">Title</label>
      <div class="col-sm-10">
        <input type="text" name="title" class="form-control" id="title" maxlength="255" required>
      </div>
    </div>
    <div class="row mb-3">
      <label for="title" class="col-sm-2 col-form-label">Release Date</label>
        <div class="col-sm-10">
            <input type="date" name="release_date" class="form-control" id="release_date" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
          <input type="text" name="description" class="form-control" id="description" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="isbn" class="col-sm-2 col-form-label">Isbn</label>
        <div class="col-sm-10">
          <input type="text" name="isbn" class="form-control" id="isbn" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="format" class="col-sm-2 col-form-label">Format</label>
        <div class="col-sm-10">
          <input type="text" name="format" class="form-control" id="format" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="number_of_pages" class="col-sm-2 col-form-label">Number of pages</label>
        <div class="col-sm-10">
          <input type="number" name="number_of_pages" class="form-control" id="number_of_pages" required>
        </div>
    </div>
    
    <input type="submit" class="btn btn-success"></button>
  </form>

@stop
