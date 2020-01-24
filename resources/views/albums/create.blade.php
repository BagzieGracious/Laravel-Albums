@extends('layouts.master')

@section('jumbotron')
  <div class="container">
    <h1 class="jumbotron-heading">Create Asset</h1>
    <p class="lead text-muted">You can easily add assets to our album by using the form below.</p>
  </div>
@endsection

@section('mainContent')
  <div class="row">
  	<div class="col-sm-8 m-auto">
  		<form method="POST" action="/albums" enctype="multipart/form-data">
  		  @include('layouts.errors')
  		  @csrf
		  <div class="form-group">
		    <label>Title</label>
		    <input type="text" class="form-control" value="{{ old('title') }}" name="title" placeholder="Enter asset title">
		  </div>

		  <div class="form-group">
		  	<label>Upload File</label>
		  	<input type="file" name="images[]" class="form-control" style="padding: 3px;" multiple>
		  </div>

		  <div class="form-group">
		    <label>Caption</label>
		    <textarea class="form-control" value="{{ old('caption') }}" name="caption" placeholder="Enter asset caption"></textarea>
		  </div>
		  <button type="submit" class="btn btn-primary">Create</button>
		</form>
  	</div>
  </div>
@endsection