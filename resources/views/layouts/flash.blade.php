@if($flash = session('message'))
	<div id="flash-message" class="alert alert-success alert-dismissible fade show" role="alert">
	  <strong>Info!</strong> {{ $flash }}
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
@endif
