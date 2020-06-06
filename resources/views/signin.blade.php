<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>{{ __('auth.sing_in') }}</title>
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
          <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
         <!-- jQuery library -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
         <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">

    </head>
    <body>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form method="get" action="{{url('login')}}">
            <h1>Create Account</h1>
            <input type="text" placeholder="Name" />
            <input type="email" placeholder="Email" />
            <input type="password" placeholder="Password" />
            <button>{{ __('auth.sing_up') }}</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form  method="get" action="{{url('login')}}">
            <h1>{{ __('auth.sing_in') }}</h1>
            <input type="email" name="email" id="email" value="{{old('email')}}" placeholder="Email" />
            <div class="error" style='color:red'>{{$errors->first("email")}}</div>
            <input type="password" name="password" id="password" value="{{old('password')}}" placeholder="Password" />
            <div class="error" style='color:red'>{{$errors->first("password")}}</div>
            <a href="#">Forgot your password?</a>
            <button>{{ __('auth.sing_in') }}</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey with us</p>
                <button class="ghost" id="signUp">{{ __('auth.sing_up') }}</button>
            </div>
        </div>
    </div>
</div>

<footer>
</footer>
    </body>
  <script type="text/javascript" src="{{ asset('js/login.js') }}"></script>
</html>