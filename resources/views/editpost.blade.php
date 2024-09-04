@extends("layouts.layout")

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

      <div class="post-container">
<h3 >Update</h3>
<div class="post">
<form method="POST" action="{{url('update_post',$post->id)}}" enctype="multipart/form-data">
@csrf
<input type="text" name="title" id="title" placeholder="Title" required value= "{{$post->title}}"><br/>
<input type="text" name="content" id="content"      rows="10" cols="50" placeholder="Content" value= "{{$post->content}}"></br>
<label > Image</label><br>
<img width="200" src="/postimage/{{$post->image}}"><br>
<label> Upload a new image: </label> <br>
<input  type="file" name="image"></br>
<input type="submit" value="update" name="submit"  style="width: 100px; " >


</form>
    

</div>

      
</div>       
@endsection

