@extends("layouts.layout")

@section("nav")
<ul>
<li><a href="home">Home</a></li>

</ul>
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

