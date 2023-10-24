<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Profile')</title>
    <link rel="shortcut icon" href="logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/html" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/font/css/all.css')}}">
    <style>
        .container-cards-profile{
            display: flex;
            justify-content: center;
            margin-top: 40px;
            flex-wrap: wrap;
            width: 100%;
            gap: 60px;
        }
        .container-cards{
            border: 1px solid #0000003b;
            padding: 25px;
            width: 330px;
            border-radius: 5px;
        }
        .card-profile{
            display: flex;
            justify-content: center;
            height: 100%;
            align-items: center;
        }
        .container-cards-profile .card-profile a{
            text-decoration: none;
            color: black;
        }
        .container-cards-profile .card-profile p{
            margin-bottom: 0;
            text-align: center;
            font-size: 30px;
        }
        .container-cards-profile .card-profile p i{
            color: #83299b;
        }
        .container-cards-profile .card-profile p:last-child{
            font-size: 18px;
            margin-top: 15px;
            letter-spacing: 2px;
            font-weight: bold;

        }
        .logout{
            outline: none;
            border: none;
            margin: 0 auto;
            display: block;
            font-size: 15px;
            letter-spacing: 1px;
            font-weight: bolder;
            margin-top: 45px;
            padding: 7px 60px 7px 60px;
            cursor: pointer;
            background-color: #83299b;
            color: #FFFFFF;
            border: 1px solid #83299b;

        }
        .logout:hover{
            background-color: #FFFFFF;
            color: #83299b;
           transition: all .3s ease-out;
        }
    </style>

</head>
<body>
<!-- All navBar -->
@include('layouts.navbar')

@section('content')

    <div class="container-sm container-cards-profile">
        <div class="container-cards">
            <div class="card-profile">
            <a href="{{url('/profile-information')}}">
                <p><i class="fa-solid fa-user"></i></p>
                <p>Information</p>
            </a>
        </div>

        </div>
        <div class="container-cards">
            <div class="card-profile">
                <a href="{{url('orders')}}">
                    <p><i class="fa-solid fa-clipboard-list"></i></p>
                    <p>Orders</p>
                </a>
            </div>
        </div>
        <div class="container-cards">
            <div class="card-profile">
                <a href="{{url('canceled-orders')}}">
                    <p><i class="fa-solid fa-clipboard-list"></i></p>
                    <p>Canceled orders</p>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class='logout'>Log out</button>
            </form>
        </div>
    </div>
@show
@include('layouts.footer')
</body>
</html>
