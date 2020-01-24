<!-- Section for change password -->
<div class="tab-pane fade" id="pass" role="tabpanel" aria-labelledby="pass-tab">
  <form class="mt-3" method="POST" action="/users/resetpassword">
    @csrf
    {{ method_field('PATCH') }}
    <strong>Change Password</strong>
    <hr>
    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
    <div class="form-group">
      <label>Current Password</label>
      <input type="password" name="current_password" class="form-control" placeholder="Enter your current password" />
    </div>

    <div class="form-group">
      <label>New Password</label>
      <input type="password" name="password" class="form-control" placeholder="Enter your new password" />  
    </div>

    <div class="form-group">
      <label>Confirm Password</label>
      <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm your new password">
    </div>
    <button class="btn btn-primary" type="submit">Change Password</button>
  </form>
</div>