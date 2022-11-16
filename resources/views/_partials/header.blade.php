@php
  $clientInfo = new App\Helpers\ClientInfo
@endphp
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a  href="{{ route('home') }}"class="nav-link px-2 link-secondary">Home</a></li>
      <li><a href="{{ route('authors.index') }}" class="nav-link px-2 link-dark">Authors</a></li>
      <li><a href="#" class="nav-link px-2 link-dark">add a new Book</a></li>
    </ul>

    <div class="col-md-3 text-end">

      @if($clientInfo->auth)
        <p>{{ $clientInfo->user['first_name']}} {{ $clientInfo->user['last_name']}}</p>
        <a type="button" href="{{ route('auth.logOut') }}" class="btn btn-primary">Log out</a>
      @else
        <a type="button" href="{{ route('auth.index') }}" class="btn btn-outline-primary me-2">Login</a>
      @endif
     
      
    </div>
  </header>