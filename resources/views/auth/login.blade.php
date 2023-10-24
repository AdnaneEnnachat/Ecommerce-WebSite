<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Login')</title>
    <link rel="shortcut icon" href="../logo/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/font/css/all.css')}}">
    <link rel="stylesheet" href="{{url('css/styles/log.css')}}">
    <link rel="stylesheet" href="{{url('css/styles/index.css')}}">


</head>
<body>

@include('layouts.navbar')

    <div class="login-form">
        <div class="content-login">
            <span>Login</span>
            <div class="login-form-content">
                <form class="myform" method="POST" action="{{ route('login') }}">
                    @csrf
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
                    <div class="d-flex check">
                        <div class="d-flex"><label>REMEMBER ME</label><input type="checkbox" name="remember"></div>
                        @if(Route::has('password.request'))
                            <div><a href="{{ route('password.request') }}">forget password?</a></div>
                        @endif
                    </div>
                    <button type="btn">Login</button>
                    <a href="{{url('register')}}" style="display: flex;
                            justify-content: center;
                            margin-top: 8px;
                            color: purple;cursor:pointer;font-size: 15px">Sign up !</a>
                </form>
            </div>
        </div>
    </div>

@include('layouts.footer')
</body>
</html>
