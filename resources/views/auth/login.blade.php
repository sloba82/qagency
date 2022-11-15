@extends('layouts.master')

@section('content')

<form method="POST" action="{{ route('auth.login')  }}">
    @csrf
    <!-- Email input -->
    <div class="form-outline mb-4">
      <input name="email" type="email" id="form2Example1" class="form-control" />
      <label class="form-label" for="form2Example1">Email address</label>
    </div>
  
    <!-- Password input -->
    <div class="form-outline mb-4">
      <input name="password" type="password" id="form2Example2" class="form-control" />
      <label class="form-label" for="form2Example2">Password</label>
    </div>
  
    <!-- Submit button -->
    <input type="submit" class="btn btn-primary btn-block mb-4">
  

  </form>

@stop
