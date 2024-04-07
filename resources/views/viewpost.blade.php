@extends("layouts.layout")

@section("nav")
<ul>
<li><a href="{{url('home')}}">Home</a></li>

</ul>
@endsection
@section("content")
{{-- <div class="form-blog"> --}}
      <div class="post-container">
<h3 >Posts</h3>
@foreach ($posts as $post)
<div class="post">
       
       <a href="{{url('post',$post->id)}}"><img width="200" src="/postimage/{{$post->image}}"></a>
       <h4>{{ $post->title }}</h4>
       <p>{{ $post->content }}</p>
       <p style="text-align: left;">Author {{ $post->username }}</p>
       <p style="text-align: right; " >created at:{{ $post->created_at }}</p>

</br><hr>
      
</div>
@endforeach

      {{-- @foreach ($categories as $category)
       <h4>{{ $category->name }}</h4>
       
      @endforeach --}}
</div>       
@endsection

