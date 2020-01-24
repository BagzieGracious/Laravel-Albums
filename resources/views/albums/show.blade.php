@extends('layouts.master')

@section('jumbotron')
  <div class="container">
    <h1 class="jumbotron-heading">Single Asset</h1>
    <p class="lead text-muted">This section displays a single asset selected.</p>
  </div>
@endsection

@section('mainContent')
  <div class="row">
    @if(!is_null($asset))
      <div class="col-sm-5 p-3">
        <div class="bg-white">
          <img src="/{{ (unserialize($asset->images))[0] }}" style="width: 100%;" />
          @if( count(unserialize($asset->images)) > 1 )
            <button 
              class="btn btn-outline-secondary m-3"
              data-toggle="modal" data-target="#imageModal"
              type="button" 
              >
              View More</button>
          @endif
        </div>
      </div>

      <div class="col-sm-7 p-3">
        <div class="bg-white p-3">
          <h3>{{ $asset->title }}</h3>    
          <p>{{ $asset->caption}}</p>
          <p class="overflow-auto mb-0">
            <label class="float-left"><b>Created by:</b> {{ $asset->user->name }}</label>
            <small class="float-right">{{ $asset->created_at->diffForHumans() }}</small>
          </p>
          
          @if(Auth::check() and Auth::user()->id == $asset->user_id)
            <form method="POST" action="/albums/{{ $asset->id }}">
              @csrf
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
            </form>
          @endif
        </div>

        <div class="bg-white p-3 mt-4">
          <h5>Comments</h5>
          <hr>

          <div id="app">
            <app-section 
              data="{{ json_encode($asset) }}" 
              auth="{{ Auth::check() == true ? auth()->id() : 0 }}"
            >    
            </app-section>
          </div>

        </div>
      </div>
    @else
      <div class="col-sm-8 m-auto text-center">
        <h3>No assets found.</h3>
      </div>
    @endif
  </div>

  <!-- Modal -->
  @include('albums.modal')
@endsection

@section('scriptContent')
  <script src="{{ mix('js/app.js' )}}"></script>
@endsection
