@extends('layouts.master')

@section('content')

{{-- {{dd($author)}} --}}

<table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Release Date</th>
      <th scope="col">Description</th>
      <th scope="col">Isbn</th>
      <th scope="col">Format</th>
      <th scope="col">Number of pages</th>
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
      </tr>
    @endforeach
  </tbody>
</table>

@stop
