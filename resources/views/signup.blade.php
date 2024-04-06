
@extends("layouts.layout")
@section("title","signup")
@section("nav")

<ul>
    <!-- <li><a href="home">Home</a></li> -->
    <li><a href="login">login</a></li>
    <li><a href="contact">contact</a></li>
</ul>

@endsection
@section("content")
<div class="form-container">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert-danger" role>{{$error}}</div>
        @endforeach  
    @endif





        <h2>Sign Up</h2>
        <form  action="{{route('signup.post')}}" method="POST">
            @csrf 
            <input type="text" name="name" id="name" placeholder="User Name" required>
            <input type="email" name="email" id="email" placeholder="email" required>
            <input type="password" name="password" id="password" placeholder="Password"   required>
            {{-- <input type="password" name="cp" id="cp" placeholder="Confirm Password" title="retype the above password" required> --}}
            <input type="submit" value="SignUp"></br>
            <h5 style="text-align:center; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Already have an account? <a href="login">login</a></h5>

        </form>
        
    </div>
@endsection