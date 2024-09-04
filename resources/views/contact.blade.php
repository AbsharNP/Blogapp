@extends("layouts.layout")
@section("title","contact")
@section("nav")
<nav class="d-flex justify-content-between align-items-center">
    <ul class="nav-list">
        <li><a href="{{ url('home') }}">@lang('messages.home')</a></li>
        {{-- <li><a href="{{ url('contact') }}">@lang('messages.contact')</a></li> --}}
        <li><a href="{{ url('mypost') }}">@lang('messages.my') @lang('messages.post')</a></li>
        <li><a href="{{ route('logout') }}">Logout</a></li>
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
<div class="container">
<h1>Contact Us</h1>
        <p>If you have any questions or need assistance, feel free to reach out:</p>
        <div class="contact-info">
            <p>Email: <a class="contact-link" href="mailto:support@wxe.com">support@example.com</a></p>
            <p>Phone: +1 (123) 456-7890</p>
        </div> 
@endsection
