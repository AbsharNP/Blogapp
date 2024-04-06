@extends("layouts.layout")
@section("title","contact")
@section("nav")
            <ul>
                <!-- <li><a href="home">Home</a></li> -->
                <li><a href="signup">Signup</a></li>
                <li><a href="login">Login</a></li>
            </ul>
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
