@extends('layouts.master')

@section('content')

{{dd($author)}}

@if (isset($message))
  <div class="alert alert-warning message-text" role="alert">
    {{$message}}
  </div>
@endif

<table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Release Date</th>
      <th scope="col">Description</th>
      <th scope="col">Isbn</th>
      <th scope="col">Format</th>
      <th scope="col">Number of pages</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($author['books'] as $book )
    <tr>
        <th>{{$book['title']}}</th>
        <td>{{$book['release_date']}}</td>
        <td>{{ Str::limit($book['description'], 50) }}</td>
        <td>{{$book['isbn']}}</td>
        <td>{{$book['format']}}</td>
        <td>{{$book['number_of_pages']}}</td>
        <td>
          <form method="POST" action="{{ route('book.delete', [ 'book' => $book['id'] , 'author' => $author['id']]) }}"  >
            @method('DELETE')
            @csrf
            <button type='submit' class="btn btn-danger">
              delete
            </button>            
           </form>
          
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

@stop
