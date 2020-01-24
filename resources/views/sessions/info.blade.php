<!-- Section for changing user information -->
<div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
  <form method="POST" action="/users/profile" class="mt-3">
    @include('layouts.errors')
    @csrf
    {{ method_field('PATCH') }}
    <strong>Change User Info</strong>
    <hr>
    <div class="form-group">
      <label>User Name</label>
      <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" required>
    </div>

    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" required>
    </div>

    <div class="form-group">
      <label>Contact</label>
      <input type="text" name="contact" value="{{ Auth::user()->contact }}" class="form-control" placeholder="Enter your contact" required>
    </div>
    
    <div class="form-group">
      <button class="btn btn-primary" type="submit">Update</button>
    </div>
  </form>
</div>