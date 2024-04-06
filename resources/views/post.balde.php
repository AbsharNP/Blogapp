@extends("layouts.layout")

@section("nav")
<ul>
<li><a href="home">Home</a></li>

</ul>
@endsection
@section("content")
{{-- <div class="form-blog"> --}}
      <div class="post-container">
<h3 >Posts</h3>
     
<div class="post">
       @foreach ($posts as $post)
       <h4>{{ $post->title }}</h4>
       <p>{{ $post->content }}</p>
       <p style="text-align: right;">written by {{ $post->username }}</p>

</br><hr>
      @endforeach
</div>

      
</div>       
@endsection

