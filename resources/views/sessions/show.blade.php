@extends('layouts.master')

@section('jumbotron')
  <div class="container">
    <h1 class="jumbotron-heading">User Profile</h1>
    <p class="lead text-muted">This page will help you view and edit your info.</p>
  </div>
@endsection

@section('mainContent')
  <div class="row">
    <div class="col-sm-4 px-3">
      <div class="bg-white text-center p-4">
        <img src="/images/avatar.jpg" style="width: 100%; margin-bottom: 20px;">
        <h3>{{ Auth::user()->name }}</h3>
        <p>{{ Auth::user()->email }}</p>
        <p>{{ Auth::user()->contact }}</p>
      </div>
    </div>

    <div class="col-sm-8 px-3">
      <div class="bg-white p-4">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="log-tab" data-toggle="tab" href="#log" role="tab" aria-controls="log" aria-selected="true"><span class="fa fa-list"></span> Activity Logs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false"><span class="fa fa-pencil"></span> Update Information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pass-tab" data-toggle="tab" href="#pass" role="tab" aria-controls="pass" aria-selected="false"><span class="fa fa-key"></span> Update Password</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          @include('sessions.activity')

          @include('sessions.info')
          
          @include('sessions.reset')
        </div>

      </div>
    </div>
  </div>
@endsection