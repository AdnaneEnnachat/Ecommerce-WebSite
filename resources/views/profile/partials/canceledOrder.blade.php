<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <title>@yield('title','Canceled orders')</title>
    <link rel="shortcut icon" href="logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/html" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/font/css/all.css')}}">
    <style>
        .order-information{
            margin-top: 30px;
        }
        .container h3{
            border-bottom: 1px solid black;
            margin-top: 50px;
            font-size: 20px;
            padding-bottom: 5px;
            font-weight: bold;
            width: 200px;
        }
        .active>.page-link, .page-link.active{
            background-color: #83299b;
            border-color: #83299b;
        }
        .page-link{
            color: #83299b;
        }
        .page-link:active,.page-link:focus{
            background-color: #83299b;
            border-color: #83299b;
            color: #FFFFFF;
            box-shadow: none;
        }
        .no-product{
            font-size: 35PX;
            letter-spacing: 1px;
            font-variant: small-caps;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 350px;
        }
    </style>
</head>

<body>
@include('layouts.navbar')
@section('content')




    <div class="container">
        <h3>CANCELED ORDERS</h3>
        <div class="order-information">
            <table class="table" style="text-align: center">
                <thead style="background-color: #83299b; color: #FFFFFF">
                <tr>
                    <td>Order</td>
                    <td>Date order</td>
                    <td>status</td>
                    <td>phone</td>
                    <td>total</td>
                </tr>
                </thead>
                @foreach($ordersCanceled as $order)
                    <tr>
                        <td>{{$order->order_number}}</td>
                        <td>{{$order->order_date}}</td>
                        <td>{{$order->status}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->total}}</td>
                    </tr>
                @endforeach
            </table>
            <div class="d-flex justify-content-center" style="margin-top: 30px">
                {!! $ordersCanceled->links() !!}
            </div>
        </div>
    </div>
@show
@include('layouts.footer')
</body>
</html>
