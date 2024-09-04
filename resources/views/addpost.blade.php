@extends("layouts.layout")
@section("title","blog")
@section("nav")
<nav class="d-flex justify-content-between align-items-center">
        <ul class="nav-list">
            <li><a href="{{ url('home') }}">@lang('messages.home')</a></li>
            {{-- <li><a href="{{ url('contact') }}">@lang('messages.contact')</a></li> --}}
            {{-- <li><a href="{{ url('mypost') }}">@lang('messages.my') @lang('messages.post')</a></li> --}}
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
@if(session()->has('error'))
        <div class="alert alert-danger">
            <button type="button" onclick="window.location.href='addpost';" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('error') }}
        </div>
    @endif
<div class="form-blog">
        @if(@session()->has('message'))

        <div class="alert alert-success" >
          <button type="button" onclick="window.location.href='addpost';" class="close" data-dissmiss="alert" aria-hidden="true">x</button>
        
        </div>
        {{session()->get('message')}}
        @endif
        <h3 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Enter your Blog</h3>
        <form method="POST" action="{{url('add_post')}}" enctype="multipart/form-data">
                @csrf 
        <input type="text" name="title" id="title" placeholder="Title" required>
        <input type="text" name="content" id="content"      rows="10" cols="50" placeholder="Content"></br>
        <input  type="file" name="image"></br>
        <input type="submit" value="Submit" name="submit"  style="width: 100px; " >
        

        </form>
@endsection
