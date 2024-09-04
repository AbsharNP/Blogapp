@extends("layouts.layout")

@section("title", "Web Design")
@section("nav")
<nav class="d-flex justify-content-between align-items-center">
  <ul class="nav-list">
      <li><a href="{{ url('home') }}">@lang('messages.home')</a></li>
      <li><a href="{{ url('contact') }}">@lang('messages.contact')</a></li>
      <li><a href="{{ url('mypost') }}">@lang('messages.my') @lang('messages.post')</a></li>
      <li><a href="{{ route('logout') }}">Logout</a></li>
  </ul>

  <div class="d-flex justify-content-end">
      <ul class="list-inline mb-0">
          <li class="list-inline-item">
              <a href="{{ route('locale.switch', ['locale' => 'en']) }}">
                  <img src="icons/UK.png" class="img-fluid img-small">
              </a>
          </li>
          <li class="list-inline-item">
              <a href="{{ route('locale.switch', ['locale' => 'fr']) }}">
                  <img src="icons/france.png" class="img-fluid img-small">
              </a>
          </li>
      </ul>
  </div>
</nav>
@endsection

@section("content")
<div class="welcome">
    <h3 style="text-align: left;">@lang('messages.welcome'), <span style="color: #0073e6;">{{ auth()->user()->name }}</span></h3>
    
    <p>@lang('messages.welcome') to our vibrant community where creativity and connection thrive!</p>
    <p>Dive into a world of inspiration and innovation, tailored just for you...</p>
    <p>Create your own blog</p>
    
    <button onclick="window.location.href='{{ url('addpost') }}';" class="price">@lang('messages.add') @lang('messages.post')</button></br></br>
    <button onclick="window.location.href='{{ url('viewpost') }}';" class="price">@lang('messages.read') @lang('messages.post')</button>

    <h1>Session Data</h1>
    <p>ID: {{ session('user_id') }}</p>
    <p>Name: {{ session('user_name') }}</p>
    <br/>
</div>
@endsection



