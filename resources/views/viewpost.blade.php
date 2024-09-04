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


@if(session()->has('message'))
<div class="alert alert-success" id="success-message">
    {{-- <button type="button" onclick="window.location.href='addpost';" class="close" data-dismiss="alert" aria-hidden="true">x</button> --}}
    {{ session()->get('message') }}
</div>
@endif



      <div class="post-container">
<h3 >Posts</h3>
@foreach ($posts as $post)
<div class="post">
       
       <a href="{{url('post',$post->id)}}"><img width="200" src="/postimage/{{$post->image}}"></a>
       <h4>{{ $post->title }}</h4>
       <p>{{ $post->content }}</p>

       <p style="text-align: left;">Author {{ $post->username }}</p>
       <p style="text-align: right; " >created at:{{ $post->created_at }}</p>


       @php
       $title = $post->title;
       $trimmedTitle = trim($title);
       $postText = $post->content;
       $length = strlen($postText);  
    //    $endsWith = str_ends_with($postText, 's');  
       $position = strpos($postText, 'my');  
       $trimmedText = Str::limit($postText, 60,'........'); 
       $lastCharacter = $length > 0 ? substr($postText, -1) : 'N/A';
       @endphp

       <h3>Strings</h3>
<h3>{{$trimmedTitle}}</h3>
<p class="card-text">
    <strong>Text:</strong> {{ $trimmedText }} <br>
    <strong>Length:</strong> {{ $length }} characters <br>
    {{-- <strong>Ends with 's':</strong> {{ $endsWith ? 'Yes' : 'No' }} <br> --}}
    <strong>Position of 'my':</strong> {{ $position !== false ? $position : 'Not found' }} <br>
    <strong>Ends with letter:</strong> {{ $lastCharacter }}

</p>




       


</br><hr>
      
</div>
@endforeach

      {{-- @foreach ($categories as $category)
       <h4>{{ $category->name }}</h4>
       
      @endforeach --}}
</div>       
@endsection

<script>
      setTimeout(function() {
          var successMessage = document.getElementById('success-message');
          if (successMessage) {
              successMessage.style.display = 'none';
          }
      }, 2000);
  </script>

