<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boutique</title>
    <link rel="shortcut icon" href="{{asset('logo/logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" type="text/html" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/styles/index.css')}}">
    <link rel="stylesheet" href="{{url('css/slick/css/slick.css')}}">
    <link rel="stylesheet" href="{{url('css/slick/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{url('css/loader/waitMe.css')}}">
    <link rel="stylesheet" href="{{url('css/font/css/all.css')}}">
</head>
<style>
    .cart-prom{
        display: none;
    }
    .main-container{
        display: flex;
        gap: 20px;
    }
    .products-container{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .filter-product{
        width: 280px;
        border: 1px solid #f5f5f5;
        background-color: #f5f5f5;
    }
    .min-products-container{
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 15px;
        max-width: 1000PX;
    }
    .filter-section h3{
        text-align: center;
        margin-top: 20PX;
        font-size: 20PX;
        font-family: 'Work Sans';
        letter-spacing: 1px;
    }
    .filter-section .filter-inputs{
        margin-top: 60PX;
        DISPLAY: block;
    }
    .filter-section .filter-inputs div{
        display: grid;
        justify-content: center;
        margin-top: 15px;
    }
    .filter-section .filter-inputs div input{
        width: 200PX;
        border: 1px solid #0000002b;
        border-radius: 4PX;
        padding: 2PX;
        margin-top: 5px;
    }
    .filter-section .filter-inputs div label{
        font-size: 14px;
    }
    .filter-section .filter-inputs div input:focus{
        outline: none;
        border: 1px solid #83299b ;
    }
    .btn-filter{
        display: flex;
        justify-content: center;
        margin-top: 90px;
    }
    .btn-filter button{
        border: 1px solid #83299b;
        background-color: #83299b;
        color: #fff;
        width: 150px;
        padding: 5px;
        display: flex;
        justify-content: center;
    }
    .container-section{
        width: 100%;
    }
    .container-section .header{
        display: flex;
        justify-content: space-between;
        background-color: #f5f5f5;
        padding: 8px;
        align-items: center;
    }
    .container-section .header select{
        width: 200px;
        padding: 4px 1px;
        border: 1px solid purple;
        font-size: 14px;
    }
    .container-section .header select:focus{
        outline: none;
        border: 1px solid purple;
    }
    .header-selects{
        display: flex;
        gap:20px;
    }
    .header-selects i{
        display: none;
    }
    .dir{
        padding: 15PX;
        align-items: center;
        display: flex;
        border-bottom: 1px solid #0000001f;
        background: #0000000a;
    }
    .dir div{
        display: flex;
        justify-content: center;
    }
    .dir div span{
        font-size: 15px;
    }
    .dir div span:nth-child(2),.dir div span:nth-child(4){
        font-weight: bold;
        margin-left: 2px;
        margin-right: 2px;
    }
    .dir div span:last-child{
        font-weight: bold;
        color: #333;
    }


    @media (max-width: 680px) {
        .filter-product{
            position: fixed;
            left: -300px;
            height: 100vh;
            top: 0;
            z-index: 3;
            width: 280px;
            transition: all .4s ease-in-out;
        }
        .activeFilter{
            left: 0;
            transition: all .4s ease-in-out;
        }
        .header-selects i{
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 25px;
            cursor: pointer;
            color: #83299b;
        }
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
<body>
@include('layouts.navbar')

        @section('content')
            <div class="container-xxl">
                <div class="dir">
                    <div><span>Boutique</span><span>/</span><span>Category</span><span>/</span><span>{{$cat}}</span></div>
                </div>
            </div>
            <div class="container-xxl main-container" >
                <div class="filter-product" id="filter-product">
                    <div class="filter-section">
                        <h3>FILTER BY PRICE</h3>
                        <form method="GET" action="{{'/boutique/categorie/'.$cat}}">
                        <div class="filter-inputs">
                            <div><label for="">Min Price :</label>
                                <input name="min" type="number"></div>
                            <div>
                                <label>Max Price :</label>
                                <input name="max" type="number">
                            </div>
                        </div>
                        <div class="btn-filter">
                            <button>Filter</button>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="container-section">
                    <div class="header">
                        <div class="header-products">
                            Product found <span style="color: #83299b">{{$count}}</span>
                        </div>
                        <div class="header-selects">
                            <form method="GET" action="{{'/boutique/categorie/'.$cat}}">
                            <div>
                                <select id="mySelect" name="opt" onchange="this.form.submit()">
                                    <option value="DESC" {{ request('opt') === 'DESC' ? 'selected' : '' }}>BY PRICE HIGH TO LOW</option>
                                    <option value="ASC" {{ request('opt') === 'ASC' ? 'selected' : '' }}>BY PRICE LOW TO HIGH</option>
                                </select>

                            </div>
                            </form>
                            <div><i id="filter" class="fa-solid fa-list"></i></div>
                        </div>
                    </div>
                    <div class="products-container" >
                        <div class="min-products-container">
                            @if($count>0)
                            @foreach($products as $product)
                        <div class="slider">
                            <div class="product-card">
                                <div class="header-card">
                                    <a href="{{url('boutique/'.$product->slug)}}"><img src="{{url($product->image)}}"></a>
                                    <span class="cart-prom">
                                <span class="details-prom">
                                    <p>-1000,00DH</p>
                                </span>
                            </span>
                                </div>
                                <div class="card-add-panier" id="add_to_panier" data-id="{{$product->id}}">
                            <span>
                                <i>
                                        <img src="{{url('icons/sac-de-courses.png')}}" width="30px" alt="" srcset="">
                                        <span class="add-panier">Add to cart</span>
                                </i>
                            </span>

                                </div>
                                <div class="footer-card">
                                    <div class="details">
                                        <p class="name-product">{{$product->nameProduct}}</p>
                                        <span class="price-product">
                                    <span class="new-price">{{$product->prix}}.00 MAD</span>
                                    <span class="old-price">{{$product->prix-1000}}.00 MAD</span>
                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                                @else
                                    <div class="no-product">No Product Found</div>
                                @endif
                        </div>
                    </div>
                    <div class="d-flex justify-content-center" style="margin-top: 30px">
                        {!! $products->links() !!}
                    </div>
                </div>
            </div>
        @show

@include('layouts.footer')
</body>
<script>
    let btnFilter = document.getElementById('filter')


    btnFilter.addEventListener('click',(e)=>{
        e.preventDefault()
        console.log('hello')
        document.getElementById('filter-product').classList.toggle('activeFilter')
        console.log(document.getElementById('filter-product'))

    })
    let min = document.getElementsByName('min');
    let max = document.getElementsByName('max');
    min[0].addEventListener('change',function (e){
        max[0].value = e.target.value;
    })

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
