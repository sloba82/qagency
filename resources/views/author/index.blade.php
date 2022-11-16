@extends('layouts.master')

@section('content')

{{-- {{dd($authors)}} --}}

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
    @foreach ( $authors['items'] as $author )
    <tr>
      <th scope="row">{{$author['id']}}</th>
      <td>{{$author['first_name']}}</td>
      <td>{{$author['last_name']}}</td>
      <td>
        <a title="Show Author" href="{{ route('author.show', $author['id']) }}"><i class="fa fa-eye" aria-hidden="true"></i><a>  

          {{-- <a title="Delete Author" href="{{ route('author.delete', $author['id']) }}"><i class="fa fa-trash" aria-hidden="true"></i><a>  --}}
          
          <form method="POST" action="{{ route('author.delete', $author['id'])  }}"  >
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
