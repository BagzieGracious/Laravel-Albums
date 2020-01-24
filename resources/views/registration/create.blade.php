@extends('layouts.master')

@section('jumbotron')
  <div class="container">
    <h1 class="jumbotron-heading">Registration Form</h1>
    <p class="lead text-muted">You can simply be part of our community by filling the form below.</p>
  </div>
@endsection

@section('mainContent')
  <div class="row">
  	<div class="col-sm-8 m-auto">
  		<form method="POST" action="/register">
  		  @include('layouts.errors')
  		  @csrf
		  <div class="form-group">
		    <label>Name</label>
		    <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Enter your name">
		  </div>

		  <div class="form-group">
		    <label>Email</label>
		    <input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Enter your email">
		  </div>

		  <div class="form-group">
		  	<label>Password</label>
		  	<input type="password" name="password" class="form-control" placeholder="Enter your password">
		  </div>

		  <div class="form-group">
		    <label>Confirm Password</label>
		    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm your password">
		  </div>
		  <button type="submit" class="btn btn-primary">Register</button>
		</form>
  	</div>
  </div>
@endsection
