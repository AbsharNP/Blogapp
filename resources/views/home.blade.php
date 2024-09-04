
@extends("layouts.layout")
@section("title","webdesign")
@section("nav")

  <nav>
            <ul>
                <li><a href="home">Home</a></li>
                <!-- <li><a href="signup">Signup</a></li> -->
                <li><a href="contact">contact</a></li>
                <li style="align-content: right;"><a href="mypost">MyPosts</a>  </li>
                <li><a href="{{route('logout')}}">Logout</a></li>
            </ul>
  </nav>
  

@endsection
@section("content")

<div class="welcome">
  <h3 style="text-align:left; ">welcome<span style= "color: #0073e6; " >{{auth()->user()->name}}</span></h3>
  
  <p>Welcome to our vibrant community where creativity and connection thrive! </p>
    <p>Dive into a world of inspiration and innovation,tailored just for you.......</p> 

    <p>Create your own blog</p>
    <button onclick="window.location.href='addpost';" class="price">add post</button></br></br>
    <button onclick="window.location.href='viewpost';" class="price">read post</button>


    <h1>session data</h1>
    <p>ID: {{session('user_id')}}</p>
    <p>name: {{session('user_name')}}</p>
    
    <br/>

</div>
    
@endsection
