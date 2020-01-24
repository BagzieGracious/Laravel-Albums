@extends('layouts.master')

@section('jumbotron')
  <div class="container">
    <h1 class="jumbotron-heading">Login Form</h1>
    <p class="lead text-muted">Welcome back to our great community.</p>
  </div>
@endsection

@section('mainContent')
  <div class="row">
  	<div class="col-sm-8 m-auto">
  		<form method="POST" action="/login">
  		  @include('layouts.errors')
  		  @csrf
		  <div class="form-group">
		    <label>Email</label>
		    <input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Enter your email">
		  </div>

		  <div class="form-group">
		  	<label>Password</label>
		  	<input type="password" name="password" class="form-control" placeholder="Enter your password">
		  </div>

		  <button type="submit" class="btn btn-primary">Login</button>
		</form>
  	</div>
  </div>
@endsection