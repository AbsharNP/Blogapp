@extends("layouts.layout")

@section("nav")
<ul>
<li><a href="{{url('home')}}">Home</a></li>
<li><a href="{{url('mypost')}}">Back</a></li>

</ul>
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

