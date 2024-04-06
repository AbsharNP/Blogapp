
    @extends("layouts.layout")
    @section("title","heyy")
    @section("nav")
   
            <ul>
                <!-- <li><a href="home">Home</a></li> -->
                <li><a href="signup">Signup</a></li>
                <li><a href="contact">contact</a></li>

            </ul>
  
    @endsection
    @section("content")
    <div class="form-container">
        <h2>Login</h2>
        <form  action="{{route('login.post')}}" method="POST">
@csrf 
            <input type="email" name="email" id="email" placeholder="email" required>
            <input type="password" name="password" id="password" placeholder="Password"   required>
            <input type="submit" value="LogIn" name="submit">
        
        <h5 style="text-align:center; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Don't have an account? <a href="signup">signup</a></h5>
        </form>
    </div>
    @endsection

