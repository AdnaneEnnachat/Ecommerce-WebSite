<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    .img-facture{
        display: flex;
        justify-content: center;
    }
    .facture-num p:first-child{
        text-align: center;
        font-size: 25px;
        letter-spacing: 1px;
    }
    .facture-num p:last-child{
        text-align: center;
    }


</style>
<body>
<div class="facture">
    <div class="img-facture">
        <img src="{{asset('logo/logo2.png')}}" width="100px" alt="">
    </div>
    <div class="facture-num">
        <p>Facture</p>
        <p><span>Numero:</span><span>{{random_int(1000,5000)}}</span></p>
    </div>
</div>
<div class="container">
<div class="row">
    <div class="col-md">
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th style="text-align: center" colspan="2">ORDER DETAILS</th>
            </tr>
            </thead>
            <tr>
            <tr>
                <th>Order Numero</th>
                <td>{{$mailOrder->numero}}</td>
            </tr>
            <tr>
                <th>Status Order</th>
                <td>{{$mailOrder->status}}</td>
            </tr>
            <tr>
                <th>Date Order</th>
                <td>{{$mailOrder->oder_date}}</td>
            </tr>
            <tr>
                <th>Total</th>
                <td>{{$mailOrder->total}} MAD</td>
            </tr>
            </tr>
        </table>
        </div>
    <div class="col-md">
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th style="text-align: center" colspan="2">USER DETAILS</th>
            </tr>
            </thead>
            <tr>
            <tr>
                <th>full Name</th>
                <td>{{$mailOrder->fullName}}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{$mailOrder->phone}}</td>
            </tr>
            <tr>
                <th>email</th>
                <td>{{$mailOrder->email}}</td>
            </tr>
            <tr>
                <th>ville</th>
                <td>{{$mailOrder->ville}}</td>
            </tr>
            <tr>
                <th>adresse</th>
                <td>{{$mailOrder->adresse}}</td>
            </tr>
            </tr>
        </table>
    </div>
</div>
</div>
<div class="container" style="margin-top: 20px">
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>image Product</th>
                <th>name Product</th>
                <th>Quantite</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
        @foreach($mailOrderDetails as $myorder)
            <tr>
                <td><img src="{{asset($myorder->image)}}" width="50px"></td>
                <td>{{$myorder->nameProduct}}</td>
                <td>{{$myorder->quantite}}</td>
                <td>{{$myorder->price}} MAD</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{url('generate/pdf/').'/'.$mailOrder->numero}}">Telecharger pdf</a>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>
