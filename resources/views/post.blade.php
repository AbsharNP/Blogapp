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
<h3 >Posts</h3>
<div class="post">
       <img width="200" src="/postimage/{{$post->image}}">
       <h4>{{ $post->title }}</h4>
       <p>{{ $post->content }}</p>
       <p style="text-align: right;">written by {{ $post->username }}</p>
       <p style="text-align: right; " >created at:{{ $post->created_at }}</p>
</br><hr>

<script>
       function showCommentField() {
           var commentField = document.getElementById('commentField');
           if (commentField.style.display === 'none') {
               commentField.style.display = 'block';
           } else {
               commentField.style.display = 'none';
           }
       }
   </script>
   <a href="#" onclick="showCommentField()" class="fa fa-comment"></a>
   <input type="text" id="commentField" style="display: none;" placeholder=".....">
   


</div>

</div>
    
</div>       
@endsection

