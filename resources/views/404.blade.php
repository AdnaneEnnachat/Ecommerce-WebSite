<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','404 NOT FOUND')</title>
    <link rel="shortcut icon" href="{{asset('logo/logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" type="text/html" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/styles/index.css')}}">
    <link rel="stylesheet" href="{{url('css/font/css/all.css')}}">




</head>
<style>
    .error{
        display: block;
        margin-top: 80px;
        margin-bottom: 130px;
        text-align: center;
    }
    .error p:first-child{
        font-size: 150PX;
        font-style: italic;
        font-family: monospace;
        font-weight: bold;
        color: #0000008c;
    }
    .error p:last-child{
        margin-top: -50px;
        font-weight: bold;
        font-family: monospace;
        color: #0000008f;
    }
</style>
<body>

<!-- All navBar -->
@include('layouts.navbar')

<div class="error container">
    <p>404</p>
    <p>PAGE NOT FOUND</p>
</div>


@include('layouts.footer')

</body>


</html>

