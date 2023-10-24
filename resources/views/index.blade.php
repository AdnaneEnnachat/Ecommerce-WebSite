<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Home')</title>
    <link rel="shortcut icon" href="{{asset('logo/logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" type="text/html" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/styles/index.css')}}">
    <link rel="stylesheet" href="{{url('css/slick/css/slick.css')}}">
    <link rel="stylesheet" href="{{url('css/slick/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{url('css/loader/waitMe.css')}}">
    <link rel="stylesheet" href="{{url('css/font/css/all.css')}}">




</head>
<body>
@include('layouts.loader')
    <!-- All navBar -->
    @include('layouts.navbar')

    <!-- All navBar -->
    @section('content')
        <div class="image-pub container-xxl" style="background-color: #12032a" >
                <div class="container-pub">
                        <a href="/"><img src="../image/PUB.png" width="100%" alt=""></a>
                </div>
                <div class="container-pub">
                <a href="/"><img src="../image/PUB.png" width="100%" alt=""></a>
                </div>
        </div>

        <!--CARDD PRODUCT PC GAMER -->
        @if(isset($PC_Data))
        <div class="products container">

            <div class="product-title">
                <div class="title">PC GAMER</div>
                <div class="all"><a href="{{url('boutique/categorie/PC GAMER')}}">see All</a></div>
            </div>

            <div class="main-slider container-md">
                @foreach($PC_Data as $data_PC)
                <div class="slider">
                    <div class="product-card">
                        <div class="header-card">
                            <a href="{{url('boutique/'.$data_PC->slug)}}"><img   src="{{asset($data_PC->image)}}"></a>
                            <span class="cart-prom">
                                <span class="details-prom">
                                    <p>-2000.00 MAD</p>
                                </span>
                            </span>
                        </div>
                        <div class="card-add-panier" id="add_to_panier" data-id="{{$data_PC->id}}">
                            <span>
                                <i id="btn">
                                    <img style="" src="{{url('icons/sac-de-courses.png')}}" width="30px" alt="" srcset="">
                                    <span class="add-panier">Add to cart</span>
                                </i>
                            </span>

                        </div>
                        <div class="footer-card">
                            <div class="details">
                                <p class="name-product">{{$data_PC->nameProduct}}</p>
                                <span class="price-product">
                                    <span class="new-price">{{$data_PC->prix}}.00 MAD</span>
                                    <span class="old-price">{{$data_PC->prix+2000}}.00 MAD</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        <!--END CARDD PRODUCT PC GAMER -->

        <!-- CARDD PRODUCT GRAPHIQUE CARD -->

        @if(isset($GPU_Data))
        <div class="products container">
            <div class="product-title">
                <div class="title">GPU</div>
                <div class="all"><a href="/">{{url('boutique/categorie/GRAPHIC CARD')}}</a></div>
            </div>

            <div class="main-slider container-md">
                @foreach($GPU_Data as $data_PC)
                    <div class="slider">
                        <div class="product-card">
                            <div class="header-card">
                                <a href="{{url('boutique/'.$data_PC->slug)}}"><img   src="{{asset($data_PC->image)}}"></a>
                                <span class="cart-prom">
                                <span class="details-prom">
                                    <p>-2000.00 MAD</p>
                                </span>
                            </span>
                            </div>
                            <div class="card-add-panier" id="add_to_panier" data-id="{{$data_PC->id}}">
                            <span>
                                <i id="btn">
                                    <img style="" src="{{url('icons/sac-de-courses.png')}}" width="30px" alt="" srcset="">
                                    <span class="add-panier">Add to cart</span>
                                </i>
                            </span>

                            </div>
                            <div class="footer-card">
                                <div class="details">
                                    <p class="name-product">{{$data_PC->nameProduct}}</p>
                                    <span class="price-product">
                                    <span class="new-price">{{$data_PC->prix}}.00 MAD</span>
                                    <span class="old-price">{{$data_PC->prix+2000}}.00 MAD</span>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
        <!--END CARDD PRODUCT GRAPHIQUE CARD -->
        @if(isset($LAPTOP_Data))
        <div class="products container">
            <div class="product-title">
                <div class="title">LAPTOP</div>
                <div class="all"><a href="{{url('boutique/categorie/LAPTOP')}}">see All</a></div>
            </div>

            <div class="main-slider container-md">
                @foreach($LAPTOP_Data as $data_PC)
                    <div class="slider">
                        <div class="product-card">
                            <div class="header-card">
                                <a href="{{url('boutique/'.$data_PC->slug)}}"><img   src="{{asset($data_PC->image)}}"></a>
                                <span class="cart-prom">
                                <span class="details-prom">
                                    <p>-2000.00 MAD</p>
                                </span>
                            </span>
                            </div>
                            <div class="card-add-panier" id="add_to_panier" data-id="{{$data_PC->id}}">
                            <span>
                                <i id="btn">
                                    <img style="" src="{{url('icons/sac-de-courses.png')}}" width="30px" alt="" srcset="">
                                    <span class="add-panier">Add to cart</span>
                                </i>
                            </span>

                            </div>
                            <div class="footer-card">
                                <div class="details">
                                    <p class="name-product">{{$data_PC->nameProduct}}</p>
                                    <span class="price-product">
                                    <span class="new-price">{{$data_PC->prix}}.00 MAD</span>
                                    <span class="old-price">{{$data_PC->prix+2000}}.00 MAD</span>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        @endif
        <!--END CARDD PRODUCT laptop -->

        @php
            $NEWPRODUCTS = DB::table('products')->orderBy('created_at','DESC')->limit(10)->get();
        @endphp

        @if(isset($NEWPRODUCTS))
            <div class="products container">
                <div class="product-title">
                    <div class="title">NEW ARRIVAGE</div>
                </div>

                <div class="main-slider container-md">
                    @foreach($NEWPRODUCTS as $new)
                        <div class="slider">
                            <div class="product-card">
                                <div class="header-card">
                                    <a href="{{url('boutique/'.$new->slug)}}"><img   src="{{asset($new->image)}}"></a>
                                    <span class="cart-prom">
                                <span class="details-prom">
                                    <p>-2000.00 MAD</p>
                                </span>
                            </span>
                                </div>
                                <div class="card-add-panier" id="add_to_panier" data-id="{{$new->id}}">
                            <span>
                                <i id="btn">
                                    <img style="" src="{{url('icons/sac-de-courses.png')}}" width="30px" alt="" srcset="">
                                    <span class="add-panier">Add to cart</span>
                                </i>
                            </span>

                                </div>
                                <div class="footer-card">
                                    <div class="details">
                                        <p class="name-product">{{$new->nameProduct}}</p>
                                        <span class="price-product">
                                    <span class="new-price">{{$new->prix}}.00 MAD</span>
                                    <span class="old-price">{{$new->prix+2000}}.00 MAD</span>
                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        @endif

        <!-- About Us -->
        <div class="container About">
            <div class="About-us">
                <div class="first-about-us">
                    <h1>GAMING FOR YOU</h1>
                    <p>Gaming PC | Workstation | Best destination Gaming Morocco on  <span><a>GAMINGFORYOU.ma</a></span> ,  n°1 of Gaming Morocco, Compare and buy your Workstation in fast delivery at home or in store.</p>
                </div>
                <div class="seconde-about-us">
                    <h1>Our Company :</h1>
                    <p> <span>Welcome to GAMING FOR YOU, where we specialize in buying gaming equipment to bring the best gaming experience to you.</span>
                        We are committed to providing high-quality gaming equipment at an affordable price. From controllers and headsets to gaming keyboards and mice, we have everything you need to take your gaming to the next level. Shop with us today and let us help you elevate your game!</p>
                </div>
                <div class="seconde-about-us">
                    <h1>Why us?</h1>
                    <p><span>Welcome to our website! We are a company dedicated to providing high-quality gaming equipment to our customers. Here are some reasons why you should consider purchasing from us:</span>

                        <span>-We have extensive experience in the gaming industry and are passionate about gaming ourselves. This allows us to offer expert advice and recommendations to our customers.</span>
                        <span>-We pride ourselves on offering only the best gaming equipment that meets or exceeds industry standards. We understand that gaming is not just a hobby, but a way of life, and we want our customers to have the best experience possible.</span>
                        <span>-We value our customers and prioritize their satisfaction above all else. Our knowledgeable and friendly staff are always here to help and provide personalized assistance to help you find the right gaming equipment for your needs.</span>
                        <span>-We understand that gaming equipment can be expensive, which is why we offer competitive pricing that won't break the bank. We believe that everyone should have access to quality gaming equipment.</span>
                        <span>-We offer easy online ordering, fast shipping, and hassle-free returns, making it convenient for our customers to purchase and receive their gaming equipment.</span>
                        <span>Thank you for considering our company for your gaming equipment needs. We hope to provide you with the best gaming experience possible!</span>

                    </p>
                </div>
            </div>
        </div>

        <!--End About Us -->

        <!-- Our Partners -->
        <div class="container partners">
            <h1>Our carriers</h1>
            <div class="Our-partners d-flex row">
                <div class="partners-desc col-sm-6">
                    <a><img src="{{asset('image/amana.png')}}" width="120px" alt=""></a>
                </div>
                <div class="partners-desc col-sm-6">
                    <a><img src="{{asset('image/express.png')}}" width="120px" alt=""></a>
                </div>
            </div>
        </div>

        <div class="container partners">
            <h1>Our partners</h1>
            <div  class="Our-partners d-flex row">
                <div class="partners-desc col-sm-3">
                    <a><img src="{{asset('image/intel.png')}}" width="80px" alt=""></a>
                </div>
                <div class="partners-desc col-sm-3">
                    <a><img src="{{asset('image/msi.png')}}" width="80px" alt=""></a>
                </div>
                <div class="partners-desc col-sm-3">
                    <a><img src="{{asset('image/nvidia.png')}}" width="160px" alt=""></a>
                </div>
                <div class="partners-desc col-sm-3">
                    <a><img src="{{asset('image/rayzen.png')}}" width="80px" alt=""></a>
                </div>
            </div>
        </div>

        <!-- End Our Partners -->
        <!-- Services -->
        <div class="container-xxl services">
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

    <!-- FOOTER -->
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







        $('.main-slider').waitMe({
            effect : 'win8',
            text : '',

    });
        setInterval(()=>{$('.main-slider').waitMe("hide");},2000)

    });

</script>

</html>
