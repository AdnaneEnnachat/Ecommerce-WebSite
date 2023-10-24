<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    .img-facture {
        display: flex;
        justify-content: center;
        margin-top: -40px;
    }
    table,tr,td,th{
        border: 1px solid rgba(0, 0, 0, 0.33);
        text-align: center;
    }
    thead{
        background-color: rgba(0, 0, 0, 0.91);
        color: #FFFFFF;
    }
    tr{
        padding: 3px;
    }

</style>
<body>
<div class="facture" style="margin-top: 10px">
    <div class="img-facture">
        <center><img src="{{$image}}" width="250px"></center>
    </div>
</div>
<div class="" style="margin:50px 5px 50PX 0PX">
    <div class="row">
        <div class="col-md">
            <table class="table">
                <thead class="table-dark">
                <tr>
                    <th style="text-align: center" colspan="2">ORDER DETAILS</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>Order Numero</th>
                    <td>{{$order->numero}}</td>
                </tr>
                <tr>
                    <th>Status Order</th>
                    <td>{{$order->status}}</td>
                </tr>
                <tr>
                    <th>Date Order</th>
                    <td>{{$order->oder_date}}</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>{{$order->total}} MAD</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md">
            <table class="table">
                <thead class="table-dark">
                <tr>
                    <th style="text-align: center" colspan="2">USER DETAILS</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>Full Name</th>
                    <td>{{$order->fullName}}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{$order->phone}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$order->email}}</td>
                </tr>
                <tr>
                    <th>Ville</th>
                    <td>{{$order->ville}}</td>
                </tr>
                <tr>
                    <th>Adresse</th>
                    <td>{{$order->adresse}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="" style="margin:50px 20px 50PX 0PX">
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th>Image Product</th>
            <th>Name Product</th>
            <th>Quantite</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
        @foreach($OrderDetails as $myorder)
            <tr>
                <td><img src="{{public_path($myorder->image)}}" width="50px"></td>
                <td>{{$myorder->nameProduct}}</td>
                <td>{{$myorder->quantite}}</td>
                <td>{{$myorder->price}} MAD</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
