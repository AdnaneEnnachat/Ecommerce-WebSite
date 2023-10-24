<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Login Admin')</title>

    <link rel="shortcut icon" href="{{asset('logo/logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{url('css/styles/log.css')}}">
    
    <link rel="stylesheet" type="text/html" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>

    <div class="login-form">
        <div class="content-login">
            <span>Admin Login</span>
            <div class="login-form-content" style="border: 1px solid #83299b8a;">
                <form class="myform" method="POST" action="{{ route('admin.login.store') }}">
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

                    <button type="btn">Login</button>
                </form>
            </div>
        </div>
    </div>




</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
