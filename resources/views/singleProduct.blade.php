<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <link rel="shortcut icon" href="{{asset('logo/logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" type="text/html" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/styles/index.css')}}">
    <link rel="stylesheet" href="{{url('css/slick/css/slick.css')}}">
    <link rel="stylesheet" href="{{url('css/slick/css/slick-theme.css')}}">

    <link rel="stylesheet" href="{{url('css/font/css/all.css')}}">


    <style>

        .img-product{

            width: 500px;
        }
        .img-product img{
            width: 100%;

            padding-right: 40px;
            padding-left: 30px;
            margin-top: 36px;
        }
        .product-price{
            margin-top: 30px;
            display: flex;
            column-gap:10px;
            border-bottom: 1px solid #00000042;
            padding-bottom: 15px;
        }
        .product-price span:first-child{
            font-size: 18px;
            color: green;
        }
        .product-price span:last-child{
            font-size: 18px;
            color: red;
            text-decoration: line-through;
        }
        .product-panier{
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid;
            padding: 20px;
        }
        .product-panier .product-quantite,.product-panier .product-btn{
            width: 100%;
        }
        .product-panier .product-quantite input{
            width: 20%;
            text-align: center;
        }
        .product-panier .product-btn button{
            border: 1px solid #83299b;
            background: #83299b;
            color: #ffff;
            display: block;
            margin-left: auto;
            padding: 5px 15px 5px 15px;
        }
        .product-panier .product-btn button:hover{
            border: 1px solid #83299b;
            background: #ffff;
            color: #83299b;
            transition: all .4s ease-out;
        }
        .product-container{
            width: 500px;
            margin-top: 115px;
            line-height: 30px;
        }
        .product-name span{
            font-size: 25px;
            letter-spacing: 1px;
            line-break: auto;
            color: #83299b;
            font-weight: bold;
            padding-bottom: 10px;
        }
        .product-name{
            border-bottom: 1px solid rgba(0, 0, 0, 0.14);
            padding-bottom: 10px;
        }
        .product-social{
            margin-top: 5px;
        }
        .product-social span{
            display: flex;
            justify-content: space-between;
            gap: 40px;
            font-size: 17px;
        }
        .product-social span div{
            display: flex;
            align-items: center;
            gap: 13px;
            font-size: 20px;
        }
        .product-social span div:first-child{
            font-size: 14px;
        }
        .product-social span div .fa-facebook{
            color: blue;
        }
        .product-social span div .fa-instagram{
            color: red;
        }
        .product-social span div .fa-whatsapp{
            color: green;
        }

        .description{
            margin-top: 40px;
        }
        .description .description-title{
            display: flex;
            justify-content: center;
            font-size: 25px;
            letter-spacing: 2px;
            font-variant-caps: small-caps;
        }
        .description .description-title span{
            border-bottom: 1px solid #00000026;
            padding: 5px;
            width: 165px;
            text-align: center;
        }
        .product-status{
            margin-top: 10px;
            font-size: 14px;
            color: #158d15;
        }
        /*.description-content{
            margin-top: 40px;
            line-height: 31px;
            font-size: 18px;
            letter-spacing: 1px;
            font-variant: small-caps;
            margin-left: 20px;
            margin-right: 20px;
        }*/
        .description-content{
            margin-top: 30px;
        }
    </style>

</head>
<body>
    @include('layouts.navbar')

    @section('content')
        <div class="container">
            <div class="container single-product row">
                <div class="img-product col-md">
                    <div>
                        <img src="{{asset($product->image)}}" alt="" srcset="">
                    </div>
                </div>
                <div class="product-container col-md">
                    <div class="product-name">
                        <span>{{$product->nameProduct}}</span>
                    </div>
                    <div class="product-status">
                        <span>Produit en stock</span>
                    </div>
                    <div class="product-price">
                        Price:<span>{{$product->prix}}.00 MAD</span>
                        <span>{{$product->prix - 1000}}.00 MAD</span>
                    </div>
                    <div class="product-panier">
                        <div class="product-quantite">
                            <span>Quantite</span>
                            <input type="number" value="1" disabled>
                        </div>
                        <div class="product-btn">
                            <button id="add_to_panier"  data-id="{{$product->id}}">Add to panier</button>
                        </div>
                    </div>
                    <div class="product-social">
                        <span>   <div>Partager<i class="fa-solid fa-share"></i> :</div>
                            <div>
                                <i class="fa-brands fa-facebook"></i>
                                <i class="fa-brands fa-instagram"></i>
                                <i class="fa-brands fa-whatsapp"></i>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
            <div class="description">
                    <div class="description-title">
                        <span>Description</span>
                    </div>
                <div class="description-content">
                    {!! $product->description !!}
                </div>
            </div>

            <div class="products container" style="margin-top: 80px">
                <div class="product-title">
                    <div class="title">similar product</div>
                    <div class="all"><a href="/">see All</a></div>
                </div>

                <div class="main-slider container-md">
                    @foreach($similar as $sim)
                        <div class="slider">
                            <div class="product-card">
                                <div class="header-card">
                                    <a href="{{url('boutique/'.$sim->slug)}}"><img   src="{{asset($sim->image)}}"></a>
                                    <span class="cart-prom">
                                <span class="details-prom">
                                    <p>-2000.00 MAD</p>
                                </span>
                            </span>
                                </div>
                                <div class="card-add-panier" id="add_to_panier" data-id="{{$sim->id}}">
                            <span>
                                <i id="btn">
                                    <img style="" src="../icons/sac-de-courses.png" width="30px" alt="" srcset="">
                                    <span class="add-panier" id="add_to_panier" >Add to cart</span>
                                </i>
                            </span>

                                </div>
                                <div class="footer-card">
                                    <div class="details">
                                        <p class="name-product">{{$sim->nameProduct}}</p>
                                        <span class="price-product">
                                    <span class="new-price">{{$sim->prix}}.00 MAD</span>
                                    <span class="old-price">{{$sim->prix+2000}}.00 MAD</span>
                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- Services -->
        <div class="container-xxl services" style="margin-top: 80px">
            <div class="Our-services d-flex">
                <div class="row first-services row">
                    <div class="delivery col-md-6">
                        <img src="{{asset('icons/delivery.svg')}}" class="service-img" width="55px" alt="">
                        <p>Delivery</p>
                        <span>Fast delivery all over Morocco</span>

                    </div>
                    <div class="paiment col-md-6">
                        <img src="{{asset('icons/paiment.svg')}}" class="service-img" width="55px" alt="">
                        <p>Payment</p>
                        <span>Secure payment 100%</span>
                    </div>
                </div>
                <div class="row seconde-services row">
                    <div class="refresh col-md-6">
                        <img src="{{asset('icons/refresh.svg')}}" class="service-img" width="55px" alt="">
                        <p>Product</p>
                        <span>Returning products within 15 days</span>
                    </div>
                    <div class="service col-md-6">
                        <img src="{{asset('icons/service.svg')}}" class="service-img" width="55px" alt="">
                        <p>Service</p>
                        <span>Customer service 24h/24h</span>
                    </div>
                </div>
            </div>
        </div>
        <!--END Services -->

    @show

    @include('layouts.footer')
</body>
<script>
    $(document).ready(function (){

        $(document).on('click','#add_to_panier',function (){
            let id = $(this).data('id')
            console.log(id)
            $.ajax({
                type: "POST",
                url: "/addProductToCart",
                data: {"_token":"{{csrf_token()}}",'id':id},
                dataType:'json',
                success: function(message){
                    console.log(message.data)

                    const product = {
                        id: message.data.id,
                        nameProduct: message.data.nameProduct,
                        image: message.data.image,
                        prix:message.data.prix,
                        quantity: 1,
                    }
                    addCart(product);
                    document.getElementById('mycart').innerHTML = '';
                    refreshPanier()


                },
                error:function (error){
                    console.log(error)
                }
            });
        })



    });

</script>
</html>
