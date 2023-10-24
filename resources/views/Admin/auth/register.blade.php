<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Admins</title>
    <link rel="stylesheet" href="{{url('css/font/css/all.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/Admin/css/style.css')}}">
    <link rel="stylesheet" href="{{url('css/styles/log.css')}}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

<style>
    #sidebar .side-menu li {
        margin-left: -26px;
    }
    .login-form .login-form-content input[type=text], .login-form .login-form-content input[type=password]{
        width: 450px;
    }
</style>
</head>
<body>


    @include('layouts.Admin.sidebar')
    <section id="content">
        @include('layouts.Admin.navbar')
        <main>
        <div class="login-form">
        <div class="content-login">
        <span style="margin-top: 0">Add an Admin</span>
        <div class="login-form-content">
            <form class="myform" method="POST" action="{{ route('register_Admin') }}">
                @csrf

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

                <label>Role Admin:</label>
                @error('role')
                <p class="errors">{{$errors->first('role')}}</p>
                @enderror <br>
                <select class="form-select" name="role">
                    <option value="admin">Admin</option>
                    <option value="superadmin">Super Admin</option>
                </select><br>

                <label>Password:</label>
                @error('password')
                <p class="errors">{{$errors->first('password')}}</p>
                @enderror <br>
                <input type="password" name="password"  placeholder="your password"><br>

                <label>Password confirmation:</label>
                @error('password_confirmation')
                <p class="errors">{{$errors->first('password_confirmation')}}</p>
                @enderror <br>
                <input type="password" name="password_confirmation"  placeholder="your password"><br>


                <button type="btn">Add Admin</button>
            </form>
        </div>
    </div>
</div>
            <div class="mt-3">
                @if(isset($admins))
                    <table class="table" style="text-align: center">
                        <thead style="background-color: #83299b;color: #FFFFFF">
                        <tr>
                            <td>name</td>
                            <td>email</td>
                            <td>role</td>
                            <td>delete</td>
                        </tr>
                        </thead>
                        @foreach($admins as $admin)
                        <tr>
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->email}}</td>
                            <td>{{$admin->role}}</td>
                            <td><form action="{{url('/admin/delete/'.$admin->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button style=" border: none; background-color: transparent;"><i style="color:red; cursor: pointer;" class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                @endif
            </div>
</main>
</section>
</body>
<script src="{{url('js/jquery/jquery.js')}}"></script>
<script src="{{url('js/Admin/js/script.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(session('message')=='added')
    Swal.fire(
        'Added!',
        'The Admin Added Successfully.',
        'success'
    )
    @endif
    @if(session('message')=='deleted')
    Swal.fire(
        'Deleted!',
        'The Admin deleted Successfully.',
        'success'
    )
    @endif
</script>
</html>
