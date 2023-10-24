<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Panier')</title>
    <link rel="shortcut icon" href="{{url('logo/logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" type="text/html" href="{{url('css/bootstrap.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/font/css/all.css')}}">
</head>
<style>
    table{
        margin-top: 30px;
    }
    table tbody tr td{
        height: 100px;
    }
    h3{
        margin-top: 35px;
        font-size: 30px;
        letter-spacing: 1px;
        border-bottom: 1px solid black;
        width: 103px;
        padding-bottom: 3px;
    }
    td p{
        display: flex;

        align-items: center;
        width: 100%;
        height: 100%;
    }
    td input{
        width: 40px;
        text-align: center;
    }
    td span{
        font-size: 18px;
        padding: 5px;
        color:#83299b;
        cursor: pointer;
    }
    td i {
        color: red;
        cursor: pointer;
    }
    tbody{
        border: 1px solid transparent;
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    .clear{
        display: flex;
        width: 100%;
        cursor: pointer;
        margin-top: 20px;
    }
    .checkout{
        display: flex;
        cursor: pointer;
        margin-top: 20px;
        width: 100%;
    }
    .clear p,.checkout p{
        border: 1px solid #12032a;
        padding: 11px 60px;
        font-size: 16px;
        color: #fff;
        background-color: #12032a;
        font-weight: 600;
        width: 100%;
        text-align: center;
    }
    .clear p{
        background-color: #fff;
        color: #12032a;

    }
    .checkout a{
        width: 100%;
    }
    .clear p:hover,.checkout p:hover{
        background-color: #fff;
        color: #12032a;
        transition: all .6s ease;
    }
    .this{
        border-top: 1px solid rgba(0, 0, 0, 0.07);
        padding: 15px;
        background-color: #f8f9fa;
        padding-bottom: 0px;
        margin-top: -17px;
    }
    .total-container{
        display: flex;
        border-bottom: 1px solid rgba(0, 0, 0, 0.06);
        padding-bottom: 15px;
    }
    .total,.price{
        width: 100%;
        text-align: center;
    }
    .total span{
        font-size: 20px;
        letter-spacing: 3px;
        font-weight: 600;
    }
    .price span{
        font-size: 20px;
        color: red;
    }
</style>
<body>
@include('layouts.navbar')

@section('content')
    <div class="container-xxl">
        <div>
            <div>
                <h3>Panier</h3>
            </div>
            <div>
                <table class="table table-light" id="panier-table">
                    <thead>
                    <tr>
                        <td></td>
                        <td>Produit</td>
                        <td>quantity</td>
                        <td>Prix</td>
                    </tr>
                    </thead>
                    <tbody id="dataPanier">

                    </tbody>
                </table>
            </div>

        </div>
        <div class="this container-xxl">
            <div class="total-container">
                <div class="total"><span>TOTAL TTC :</span></div>
                <div class="price"><span id="price">MAD</span></div>
            </div>
            <div class="d-flex">
                <div class="checkout"><a href="{{url('check')}}"><p id="checkout">Check Out</p></a></div>
                <div class="clear"><p id="clearCart">Clear cart</p></div>
            </div>

        </div>
    </div>



@show
@include('layouts.footer')
</body>

<script>

    $(document).ready(function (){
        let cart = getCart()
        let totalPrix = totalPrice()
        let numberProduct = getNumberProduct()

        if(cart.length>0){
            for(let i = 0;i<cart.length;i++){

                const content = `
                    <tr>
                        <td data-id=${cart[i].id} id="remove"><p style="justify-content: center;" ><i class="fa-solid fa-trash"></i></p></td>
                        <td><p><img src="../${cart[i].image}" width="50px" style="margin-right: 20px"> ${cart[i].nameProduct}</p></td>
                        <td><p><span class='mois' id='${cart[i].id}'>-</span><input style="color: black" type="number" data-id='${cart[i].id}' id='${cart[i].prix}' class="quantity" value="${cart[i].quantity}" disabled><span id='${cart[i].id}' class="plus">+</span></p></td>
                        <td><p>${cart[i].prix} MAD</p></td>
                    </tr>
                           `

                $('#dataPanier').append(content)

            }

    }
        $(document).on('click','#remove',function (){
            console.log($(this).data('id'))
            let id = $(this).data('id')
            removeProduct(id)
            location.reload()
        })
        $(document).on('click','#clearCart',function (){
            clearCart()
            location.reload()
        })



        $('#total').text(totalPrice());
        $('#price').text(totalPrice()+' MAD');



        let incrementButton = $('.plus');
        let decrementButton = $('.mois');
        let inputs = $('.quantity');



        for(let j = 0;j<incrementButton.length;j++){
            let plusButton = incrementButton[j];


            plusButton.addEventListener('click',function (e){

                let id  = e.target.id;
                inputs[j].value = parseInt(inputs[j].value) + 1;
                updateQuantity(id,inputs[j].value);
                $('#total').text(totalPrice());
                $('#price').text(totalPrice()+' MAD');
                document.getElementById('mycart').innerHTML = '';
                refreshPanier();
                if(inputs[j].value<=0){
                    location.reload();
                }

            })
        }
        for(let j = 0;j<decrementButton.length;j++){
            let moisButton = decrementButton[j]

            moisButton.addEventListener('click',function (e){
                let id  = e.target.id;
                inputs[j].value = parseInt(inputs[j].value) - 1;
                updateQuantity(id,inputs[j].value);
                $('#total').text(totalPrice());
                $('#price').text(totalPrice()+' MAD');
                document.getElementById('mycart').innerHTML = '';
                refreshPanier();

                if(inputs[j].value<=0){
                    location.reload();
                }

            })
        }




    })

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
