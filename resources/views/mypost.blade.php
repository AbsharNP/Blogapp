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
<h3 >My Posts</h3>
@foreach ($posts as $post)
<div class="post">
    
    <a href="{{url('edit_post',$post->id)}}"> <img width="200" src="/postimage/{{$post->image}}"></a>
    <h4>{{ $post->title }}</h4>
    <p>{{ $post->content }}</p>
    <p style="text-align: right; " ><a class="edit-link"  href="{{url('edit_post',$post->id)}}"><i class="fa fa-pencil"></i></a>          <a class="trash-link" href="{{url('delete/'.$post->id)}}"><i class="fa fa-trash"></i></a></p>      
    <p style="text-align: right; " >created at:{{ $post->created_at }}</p>
    <hr>
</div>
@endforeach

      
</div>       
@endsection

