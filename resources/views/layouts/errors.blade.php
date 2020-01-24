@if(count($errors))
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <ul class="mb-0 py-0 px-3">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
      </ul>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
@endif
