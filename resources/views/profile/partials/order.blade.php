<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <title>@yield('title','Orders')</title>
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
            width: 80px;
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
        .modal-content{
            width: 600PX;
        }
    </style>
</head>

<body>
@include('layouts.navbar')
@section('content')

    <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ORDER INFORMATION</h5>
                    <button type="button" class="btn btn-danger close"  id="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <table class="table">
                        <thead class="table-dark">
                        <tr>
                            <th style="text-align: center" colspan="2">ORDER DETAILS</th>
                        </tr>
                        </thead>
                        <tr>
                        <tr>
                            <th>Order Numero</th>
                            <td id="numero"></td>
                        </tr>
                        <tr>
                            <th>Status Order</th>
                            <td class="status" id="status"></td>
                        </tr>
                        <tr>
                            <th>Date Order</th>
                            <td id="date"></td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td id="quantity"></td>
                        </tr>

                        <tr>
                            <th>Total</th>
                            <td id="Total"> MAD</td>
                        </tr >

                        </tr>
                    </table>


                    <table class="table">
                        <thead class="table-dark">
                        <tr>
                            <th style="text-align: center" colspan="2">USER DETAILS</th>
                        </tr>
                        </thead>
                        <tr>
                        <tr>
                            <th>full Name</th>
                            <td id="name"></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td id="phone"></td>
                        </tr>
                        <tr>
                            <th>email</th>
                            <td id="email"></td>
                        </tr>
                        <tr>
                            <th>ville</th>
                            <td id="ville"></td>
                        </tr>
                        <tr>
                            <th>adresse</th>
                            <td id="adresse"></td>
                        </tr>
                        </tr>
                    </table>
                    <table class="table">
                        <thead class="table-dark">
                        <tr>
                            <td>Product</td>
                            <td>Product Name</td>
                            <td>quantite</td>
                        </tr>
                        </thead>

                        <tbody id="info">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <h3>ORDERS</h3>
        <div class="order-information">
            <table class="table" style="text-align: center">
                <thead style="background-color: #83299b; color: #FFFFFF">
                <tr>
                    <td>Order</td>
                    <td>Date order</td>
                    <td>status</td>
                    <td>total</td>
                    <td>download</td>
                    <td>view</td>
                </tr>
                </thead>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->numero}}</td>
                    <td>{{$order->oder_date}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->total}} MAD</td>
                    <td><a href="generate/pdf/{{$order->numero}}"><i class="fa-solid fa-file-arrow-down"></i></a></td>
                    <td><i data-order="{{$order->numero}}" id="view" style="color: #83299b;text-align: center;width: 100%; cursor: pointer" class="fa-solid fa-eye"></i></td>
                </tr>
                @endforeach
            </table>
            <div class="d-flex justify-content-center" style="margin-top: 30px">
                {!! $orders->links() !!}
            </div>
        </div>
    </div>
@show
@include('layouts.footer')
</body>
<script>
    $(document).ready(function (){

        $('#close').click(function(){
            $('#myModal').modal('hide')
        });

        $(document).on('click','#view',function (){
            $('#myModal').modal('show')
            let numero  = $(this).data('order')
            @if(isset($orders))
            let Orders = @json($orders);
            @endif
            let order =Orders.data
            console.log(order)
            let getOrder = order.find((item) => item.numero == numero);



            $('#numero').text(getOrder.numero)
            $('#status').text(getOrder.status)
            $('#Total').text(getOrder.total + ' MAD')
            $('#date').text(getOrder.oder_date)


            $('#name').text(getOrder.fullName)
            $('#adresse').text(getOrder.adresse)
            $('#phone').text(getOrder.phone)
            $('#email').text(getOrder.email)
            $('#ville').text(getOrder.ville)
            info.innerHTML = ''
            let total = 0
            let products = getOrder.products;
            products.forEach((product)=>{

                total += product.pivot.quantite
                let info = document.getElementById('info')

                info.innerHTML +=  `
                                <tr>
                                <td><img src="{{url('')}}${'/' + product.image}" alt="" width="60px" id="image" srcset=""></td>
                                <td>${product.nameProduct}</td>
                                <td>${product.pivot.quantite}</td>
                                </tr>
                    `
                $('#info').html(

                )

            })
            $('#quantity').text(total)


        })
    })
</script>
</html>
