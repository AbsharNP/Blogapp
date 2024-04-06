@extends("layouts.layout")

@section("nav")
<ul>
<li><a href="home">Home</a></li>

</ul>
@endsection
@section("content")
<div class="form-blog">
<h3 >Posts</h3>
       {{-- @foreach ($blogs as $blog)
        <h4>{{ $blog->title }}</h4>
        <p>{{ $blog->content }}</p>
       @endforeach --}}

       @foreach ($posts as $post)
       <h4>{{ $post->title }}</h4>
       <p>{{ $post->content }}</p>
       <p>written by {{ $post->username }}</p>
      @endforeach

      {{-- @foreach ($categories as $category)
       <h4>{{ $category->name }}</h4>
       
      @endforeach --}}
</div>       
@endsection

