<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <title>@yield('title','Profile information')</title>
    <link rel="shortcut icon" href="logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/html" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/font/css/all.css')}}">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        font-family: "Inter", sans-serif;
    }
    .formbold-main-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px;
        border: 1px solid #00000014;
        border-radius: 8px;
        margin-top: 45px;
        width: 635px;

    }
    .profile-information,.Password-information{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .formbold-form-wrapper {
        margin: 0 auto;
        max-width: 550px;
        width: 100%;
        background: white;

    }


    .formbold-input-flex > div {
        width: 100%;
    }

    .formbold-form-input {
        width: 100%;
        padding: 13px 22px;
        border-radius: 5px;
        border: 1px solid #DDE3EC;
        background: #FFFFFF;
        font-weight: 500;
        font-size: 16px;
        color: #07074D;
        outline: none;
        resize: none;
    }
    .formbold-form-input::placeholder {
        color: #536387;
    }
    .formbold-form-input:focus {
        border-color: #83299b;
        box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }
    .formbold-form-label {
        color: #07074D;
        font-size: 14px;
        line-height: 24px;
        display: block;
        margin-bottom: 10px;
    }

    .formbold-btn {
        text-align: center;
        width: 100%;
        font-size: 16px;
        border-radius: 5px;
        padding: 14px 25px;
        border: none;
        font-weight: 500;
        background-color: #83299b;
        color: white;
        cursor: pointer;
        margin-top: 25px;
    }
    .formbold-btn:hover {
        box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }
    .formbold-main-wrapper h4{
        font-size: 15px;
        font-weight: bold;
        letter-spacing: 1px;

    }
    .formbold-main-wrapper p{
        font-size: 12px;
        opacity: 0.7;

    }

</style>

<body>
    @include('layouts.navbar')
        @section('content')
            <div class="container-xxl">
                <div class="profile-information">
                <div class="formbold-main-wrapper">
                    <div class="formbold-form-wrapper">
                        <h4>Profile Information :</h4>
                        <p>Update your account's profile information and email address.</p>
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="formbold-input-flex">
                                <div>
                                    <label for="name" class="formbold-form-label">Name :</label>
                                    @if ($errors->get('name'))
                                        @foreach($errors->get('name') as $error)
                                            <span style="color: red ; font-size: 13px">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        value="{{auth()->user()->name}}"
                                        placeholder="name"
                                        class="formbold-form-input"
                                    />
                                </div>
                                <div>
                                    <label for="email" class="formbold-form-label">Email :</label>
                                    @if ($errors->get('email'))
                                        @foreach($errors->get('email') as $error)
                                            <span style="color: red ; font-size: 13px">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                    <input
                                        type="text"
                                        name="email"
                                        id="email"
                                        value="{{auth()->user()->email}}"
                                        placeholder="Email"
                                        class="formbold-form-input"
                                    />
                                </div>
                            <button class="formbold-btn">
                                Save
                            </button>
                        </form>
                    </div>
                </div>
                </div>
                </div>
                <div class="Password-information">
                    <div class="formbold-main-wrapper">
                        <div class="formbold-form-wrapper">
                            <h4>Update Password :</h4>
                            <p>Ensure your account is using a long, random password to stay secure.</p>

                            @if (session('status') === 'password-updated')
                                <span style="color: green">Updated</span>
                            @endif

                            <form action="{{route('password.update')}}" method="POST">
                                @csrf
                                @method('put')
                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="current_password" class="formbold-form-label">Current password :</label>
                                        @if ($errors->updatePassword->get('current_password'))
                                                @foreach($errors->updatePassword->get('current_password') as $error)
                                                    <span style="color: red ; font-size: 13px">{{ $error }}</span>
                                                @endforeach
                                        @endif
                                        <input
                                            type="password"
                                            name="current_password"
                                            id="current_password"
                                            placeholder="current password"
                                            class="formbold-form-input"
                                        />
                                    </div>
                                    <div>
                                        <label for="password" class="formbold-form-label">New password :</label>
                                        @if ($errors->updatePassword->get('password'))
                                                @foreach($errors->updatePassword->get('password') as $error)
                                                    <span style="color: red ; font-size: 13px">{{ $error }}</span>
                                                @endforeach
                                        @endif
                                        <input
                                            type="password"
                                            name="password"
                                            id="password"
                                            placeholder="New password"
                                            class="formbold-form-input"
                                        />
                                    </div>
                                    <div>
                                        <label for="password_confirmation" class="formbold-form-label">Confirm password :</label>
                                        <input
                                            type="password"
                                            name="password_confirmation"
                                            id="password_confirmation"
                                            placeholder="Confirm password"
                                            class="formbold-form-input"
                                        />
                                    </div>
                                    <button class="formbold-btn">
                                        Save
                                    </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="delete Account">

            </div>
            </div>
        @show
    @include('layouts.footer')
</body>
</html>
