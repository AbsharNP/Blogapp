
@extends("layouts.layout")
@section("title","signup")
@section("nav")

<nav class="d-flex justify-content-between align-items-center">
    <ul class="nav-list">
        <li><a href="login">login</a></li>
        <li><a href="{{ url('contact') }}">@lang('messages.contact')</a></li>
        {{-- <li><a href="{{ url('mypost') }}">@lang('messages.my') @lang('messages.post')</a></li>
        <li><a href="{{ route('logout') }}">Logout</a></li> --}}
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