@extends("layouts.layout")


@section("nav")
<ul>
<li><a href="{{url('home')}}">Home</a></li>
<li><a href="{{url('viewpost')}}">Back</a></li>

</ul>
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

