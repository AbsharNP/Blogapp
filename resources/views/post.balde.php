@extends("layouts.layout")

@section("nav")
<ul>
<li><a href="home">Home</a></li>

</ul>
@endsection
@section("content")
<div class="form-blog">
<h3 >Your Blog</h3>
       @foreach ($posts as $post)
        <h4>{{ $post->title }}</h4>
        <p>{{ $post->content }}</p>
        <p>{{ $post->created_at }}</p>
       @endforeach
</div>      
<!-- <div class="category-container">
@foreach($categories as $category)
<p><a href="">{{ $category->name }}</a></p>

@endforeach
</div>  -->
@endsection

