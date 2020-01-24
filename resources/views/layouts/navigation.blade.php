<header>
  <div class="navbar navbar-dark bg-dark box-shadow w-100" style="position: fixed; z-index: 9;">
    <div class="container d-flex justify-content-between">
      <a href="/albums" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
        <strong>Album</strong>
      </a>

      @if(Auth::check())
        <a href="/albums/create" class="text-white ml-auto text-decoration-none">Create</a>
        <a href="/users/profile" class="text-white ml-3 text-decoration-none">Profile</a>
        <a href="/logout" class="text-white ml-3 text-decoration-none">Logout</a>
      @else
        <a href="/login" class="text-white ml-auto text-decoration-none">Login</a>
        <a href="/register/create" class="text-white ml-3 text-decoration-none">Register</a>
      @endif
    </div>
  </div>
</header>