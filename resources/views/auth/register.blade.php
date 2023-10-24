<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Login')</title>
    <link rel="shortcut icon" href="../logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/html" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/font/css/all.css')}}">
    <link rel="stylesheet" href="{{url('css/styles/log.css')}}">
    <link rel="stylesheet" href="{{url('css/styles/index.css')}}">

</head>
<body>

@include('layouts.navbar')

    <div class="login-form">
    <div class="content-login">
        <span>Register</span>
        <div class="login-form-content">
            <form class="myform" method="POST" action="{{ route('register') }}">
                @csrf
                <label>Name:</label>
                @error('name')
                <p class="errors">{{$errors->first('name')}}</p>
                @enderror <br>
                <input type="text" name="name" placeholder="Email" value="{{old('name')}}"><br>
                <label>Email:</label>
                @error('email')
                <p class="errors">{{$errors->first('email')}}</p>
                @enderror <br>
                <input type="text" name="email" placeholder="Email" value="{{old('email')}}"><br>
                <label>Password:</label>
                @error('password')
                <p class="errors">{{$errors->first('password')}}</p>
                @enderror <br>
                <input type="password" name="password"  placeholder="your password"><br>
                <label>Confirmation Password:</label>
                @error('password_confirmation')
                <p class="errors">{{$errors->first('password_confirmation')}}</p>
                @enderror <br>
                <input type="password" name="password_confirmation"  placeholder="repeat your password"><br>
                <div class=" check">
                    @if(Route::has('login'))
                        <div><a href="{{ route('login') }}">already have an account?</a></div>
                    @endif
                </div>
                <button type="btn">Register</button>
            </form>
        </div>
    </div>
</div>

@include('layouts.footer')

</body>
</html>
