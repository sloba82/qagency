@extends('layouts.master')

@section('content')

@if (isset($message))
  <div class="alert alert-warning message-text" role="alert">
    {{$message}}
  </div>
@endif

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ( $authors['items'] as $author )
    <tr>
      <th scope="row">{{$author['id']}}</th>
      <td>{{$author['first_name']}}</td>
      <td>{{$author['last_name']}}</td>
      <td>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a title="Show Author" class="btn btn-primary" href="{{ route('author.show', $author['id']) }}">Books<a> </li>
          <li>
            <form method="POST" action="{{ route('author.delete', $author['id'])  }}"  >
              @method('DELETE')
              @csrf
              <button type='submit' class="btn btn-danger">
                delete
              </button>            
            </form>
          </li>
        </ul>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div>Pages </div>
@foreach (range(1, $authors['total_pages']) as $page)
  <a href="{{ route('authors.index', ['page' => $page]) }}">{{$page}}</a>
@endforeach

@stop
