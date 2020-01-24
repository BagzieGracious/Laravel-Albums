@extends('layouts.master')

@section('jumbotron')
  <div class="container">
    <h1 class="jumbotron-heading">Album</h1>
    <p class="lead text-muted">This is the entire collection of images we have in our album.</p>
  </div>
@endsection

@section('mainContent')
  <div class="row">
    @forelse($assets as $asset)
      @include('albums.asset')
    @empty
      <div class="col-sm-8 m-auto text-center">
        <h3>No assets found.</h3>
      </div>
    @endforelse
  </div>

  <div class="col-sm-12">
    {{ $assets->render() }}
  </div>
@endsection