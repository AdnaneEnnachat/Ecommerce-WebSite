<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Checkout')</title>
    <link rel="shortcut icon" href="logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/html" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../icons/font/css/all.css">
    <link rel="stylesheet" href="{{url('css/font/css/all.css')}}">
    <link rel="stylesheet" href="{{url('css/styles/flash.min.css')}}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;


        }

        body {
            font-family: "Inter", Arial, Helvetica, sans-serif;
            font-family: 'Lato', sans-serif;
        }



        .formbold-mb-5 {
            margin-bottom: 20px;
        }

        .formbold-form-wrapper {
            margin: 0 auto;
            width: 90%;
            background: white;
        }
        .formbold-form-label {
            display: block;
            font-weight: 500;
            font-size: 16px;
            color: #07074d;
            margin-bottom: 12px;
        }


        .formbold-form-input {
            width: 100%;
            padding: 12px 24px;
            border-radius: 6px;
            border: 1px solid #e0e0e0;
            background: white;
            font-weight: 500;
            font-size: 16px;
            color: #6b7280;
            outline: none;
            resize: none;
        }
        .formbold-form-input:focus {
            border-color: #6a64f1;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }


        @media (min-width: 540px) {
            .sm\:w-half {
                width: 50%;
            }
        }
        .section{
            margin-top: 30px;
        }
        .billing-details .title{
            margin: 30px 0 30px 0px;
            font-size: 23px;
            letter-spacing: 2px;
            font-weight: bold;
            color: black;
        }
        .order-summary{
            line-height: 50px;
        }
        .order-col{
            display: grid;
            grid-template-columns: auto auto;
            justify-content: space-between;

        }
        .order-col strong,.exp{
            font-family: 'Lato', sans-serif;
            letter-spacing: 1px;
            font-size: 15px;
            font-weight: bold;
            color: black;
        }
        .order-products{
            margin-top: 10px;
            line-height: 35px;
        }
        .order-col-1,.order-col-3{
            border-bottom: 1px solid rgba(0, 0, 0, 0.15);
            padding-bottom: 5px;
        ;
        }
        .exp{
            display: flex;
            align-items: center;
            justify-content: center;
            grid-column: 1/3;
        }
        .delivery-container{
            display: grid;
            grid-template-columns: auto auto auto;
            border-bottom: 1px solid rgba(0,0,0,0.15);
            padding-bottom: 20px;
        }
        .delivery-method{
            line-height: 35px;
            margin-top: 20px;
        }
        .input-radio{
            display: flex;
        }
        .delivery{
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-left: 5px;
        }
        .delivery span{
            font-size: 14px;
        }
        .order-details{

            border-radius: 0;
            padding: 0 30px;
            border: 1px solid #bfbfbf;

            background-color: #f6f6f6;
            margin: 95px 0 0 0;


        }
        .order-details .title{
            margin-top: 15px;
            margin-bottom: 10px;
            font-size: 20px;
            font-weight: 600;
            text-align: center;

        }
        .delivery-col{
            margin-top: 20px;
            border-bottom: 1px solid rgba(0,0,0,0.15);
            padding-bottom: 20px;
        }
        .paiment{
            margin-top: 15px;
            color: black;

        }
        .paiment span{
            margin-left: 10px;
            color: black;
            font-weight: bold;
        }
        .condition-desc{
            font-size: 13px;
            margin-top: 25px;
            opacity: 0.7;
            letter-spacing: 1px;
            font-family: Arial;
            line-height: 23px;
            margin-bottom: 10px;
        }
        .condition .condition-input{
            display: flex;
            width: 100%;
            gap: 10px;
            margin-top: 10px;
        }
        .condition .condition-input span{
            font-size: 13px;
        }
        .order{
            margin-top: 20px;
            width: 100%;
            outline: none;
            border: none;
            background-color:#83299b;
            color: white;
            padding: 7px;
            margin-bottom: 20px;
        }
        .required{
            color: red;
        }
        .order-col .name-product,.order-col .price{
            font-size: 14px;
        }
        .order-total strong{
            color: red;
        }
        .order-col .quantite,.order-col .price{
            color: #83299b;
        }
        .empty-cart{

            background-color: #0000001c;
            padding: 11px;
            font-weight: 600;
            font-size: 14px;
            letter-spacing: 1px;
            font-family: monospace;
            margin-top: 60px;
            margin-bottom: 110px;
            border-top: 5px solid #83299b;
        }
        .errors-message{
            border-top: 3px solid red;
            background-color: gainsboro;
            padding-top: 20px;
            padding-bottom: 20px;
            display: none;
        }
        #setMsg{
            display: block;
            list-style: none;
            line-height: 28px;
            font-size: 15px;
        }


    </style>
</head>
<body>
@include('layouts.navbar')

@section('content')

    <div class="section" id="">

        <div class="container col-md-12 " id="section">
            <div class="errors-message">
                <ul id="setMsg">

                </ul>
            </div>

        </div>

    </div>



@show
@include('layouts.footer')
</body>
<script src="{{url('js/flash.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
    $(document).ready(function (){

        let cart = getCart();
        if(cart.length>0){

            let checkoutContent = `<div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7" >
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Billing address</h3>
                        </div>
                        <div>
                            <div>
                                <div>
                                    <div>
                                        <div class="formbold-main-wrapper">
                                            <!-- Author: FormBold Team -->
                                            <!-- Learn More: https://formbold.com -->
                                            <div class="formbold-form-wrapper">
                                                <form action="" id="myform" method="POST">
                                                    <div class="formbold-mb-5">
                                                        <label for="name" class="formbold-form-label"> Full Name<span class="required">*</span></label>
                                                        <input
                                                            type="text"
                                                            name="name"
                                                            id="name"
                                                            placeholder="Full Name"
                                                            class="formbold-form-input"
                                                        />
                                                    </div>
                                                    <div class="formbold-mb-5">
                                                        <label for="phone" class="formbold-form-label"> Phone Number<span class="required">*</span></label>
                                                        <input
                                                            type="text"
                                                            name="phone"
                                                            id="phone"
                                                            placeholder="Enter your phone number"
                                                            class="formbold-form-input"
                                                        />
                                                    </div>
                                                    <div class="formbold-mb-5">
                                                        <label for="ville" class="formbold-form-label"> Ville<span class="required">*</span></label>
                                                        <input
                                                            type="text"
                                                            name="ville"
                                                            id="ville"
                                                            placeholder="Enter your ville"
                                                            class="formbold-form-input"
                                                        />
                                                    </div>
                                                    <div class="formbold-mb-5">
                                                        <label for="adresse" class="formbold-form-label"> Adresse<span class="required">*</span></label>
                                                        <input
                                                            type="text"
                                                            name="adresse"
                                                            id="adresse"
                                                            placeholder="Enter your adresse"
                                                            class="formbold-form-input"
                                                        />
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /Billing Details -->



                </div>

                <!-- Order Details -->
                <div class="container-fluid col-xs-12 col-sm-12 col-md-12 col-lg-5 order-details">
                    <div class="section-title">
                        <h3 class="title">Your order</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col order-col-1">
                            <div><strong>PRODUCT</strong></div>
                            <div ><strong>SOUS-TOTAL</strong></div>
                        </div>
                        <div class="order-products" id="order-details">

                        </div>
                        <div class="order-col order-col-3">
                            <div><strong>SOUS-TOTAL</strong></div>
                            <div class="order-total" ><strong id="first-total"></strong></div>
                        </div>
                    </div>
                    <div class="delivery-container">
                        <div class="exp"><span>Expédition</span></div>

                    <div class="delivery-method">
                        <div class="input-radio">
                            <input type="radio" name="delivery" id="delivery" value="30" checked>
                            <label for="delivery-1" class="delivery">
                                <span>Delivery by Amana 24h :</span>
                                <span>30,00DH</span>

                            </label>

                        </div>
                        <div class="input-radio">
                            <input type="radio" name="delivery" id="delivery" value="30">
                            <label for="delivery-1" class="delivery">
                                <span>Delivery by Express 24h:</span>
                                <span>30,00DH</span>

                            </label>

                        </div>
                    </div>
                    </div>
                    <div class="order-col delivery-col">
                        <div><strong>TOTAL</strong></div>
                        <div class="order-total"><strong>4330$</strong></div>
                    </div>
                    <div class="input-radio paiment">
                        <input type="radio" name="Paiment" value="cash" id="paiment" checked>
                        <label for="delivery-1" class="delivery">
                            <span>Cash on delivery</span>
                        </label>
                    </div>
                    <div class="condition">
                        <div class="condition-desc">
                            <span>Vos données personnelles seront utilisées pour traiter votre commande, soutenir votre expérience sur ce site Web et à d'autres fins décrites dans notre politique de confidentialité.</span>
                        </div>
                        <div class="condition-input">
                            <input type="checkbox" id="conditions">
                            <span>J'ai lu et j'accepte le site conditions générales<span class="required">*</span></span>
                        </div>
                    </div>
                    <button class="order" id="savePanier">Place Order</button>
                </div>
                <!-- /Order Details -->
            </div>`




            $('#section').append(checkoutContent)
            let totalPrix = totalPrice();
            $('#first-total').text(totalPrix +` MAD`)
            cart.forEach((items)=>{
                const productContent = ` <div class="order-col">
                                <div class="name-product"><span class="quantite">${items.quantity}x</span>${items.nameProduct}</div>
                                <div class="price">${items.prix} MAD</div>
                            </div>`
                $('#order-details').append(productContent);

                console.log(items)
            })
        }
        else{
            const emptyCart = `<div class='empty-cart'>You can't make an order because your panier empty</div>`
            $('#section').html(emptyCart)
        }

    })

    @if(!auth()->user())
    $(document).on('click','#savePanier',function () {
        window.FlashMessage.warning('You must be connected we will redirect you after 2s', {
            progress: true,
            interactive: false,
            timeout: 2000,
            appear_delay: 200,
            container: '.flash-container',
            theme: 'default',
            classes: {
                container: 'flash-container',
                flash: 'flash-message',
                visible: 'is-visible',
                progress: 'flash-progress',
                progress_hidden: 'is-hidden'
            }
        });

        setTimeout(()=>{ location.href= "{{url('login')}}" } ,2000)


    })
    @else
    $(document).on('click','#savePanier',function () {
        // let delivery = $('#delivery').val();
        let name = $('#name').val();
        let email = $('#email').val();
        let adresse = $('#adresse').val()
        let phone =  $('#phone').val()
        let ville = $('#ville').val();
        let paiment = $('#paiment');

        let errors = [];
        if(paiment.checked != null){
            errors.push({'paiment method': 'chose the paiment method'})
        }
        if(paiment.checked != null){
            errors.push({'paiment method': 'chose the paiment method'})
        }
        if(name.length<=0){
            errors.push({'Full Name':'must be required'});
        }
        if(adresse.length<=0){
            errors.push({'Adresse':'must be required'})
        }
        console.log((parseInt(phone)))
        if(phone.length<=0){
            errors.push({'Phone Number':'must be required'})
        }
        else{
            if(isNaN(parseInt(phone))){
                errors.push({'Phone Number':' is not a valid phone number'})
            }
            else{
                let regX = /(\+212|0)([ \-_/]*)(\d[ \-_/]*){9}$/;
                if(phone.match(regX)===null){
                    errors.push({'Phone Number':' is not a valid phone number'})
                }
            }
        }
        if(ville.length<=0){
            errors.push({'Ville':'must be required'})
        }
        if($('#conditions').is(':checked') !=true){
            errors.push({'':'Veuillez lire et accepter les conditions générales pour poursuivre votre commande.'})
        }
        $('#setMsg').html('');

        if(errors.length > 0){
            for(let j = 0 ;j<errors.length;j++){
                const errorMessage = `<li><strong>${Object.keys(errors[j])}</strong> ${Object.values(errors[j])}</li>`
                $('#setMsg').append(errorMessage);
                document.documentElement.scrollTop = 0;
                document.body.scrollTop = 0;
                $('.errors-message').css('display','block');
            }
        }
        else{
            let dataPanier = getCart()
            $.ajax({
                type: 'POST',
                url: '/panier/save/',
                data: { "_token": "{{csrf_token()}}","dataPanier":dataPanier,"name":name,"email":email,"adresse":adresse,"ville":ville,"phone":phone,'total':totalPrice()},
                datatype: 'json',
                success: function (data) {

                    if(data.message == 'success'){
                        clearCart()
                        window.FlashMessage.success('Order placed successfly', {
                            progress: true,
                            interactive: false,
                            timeout: 2000,
                            appear_delay: 200,
                            container: '.flash-container',
                            theme: 'default',
                            classes: {
                                container: 'flash-container',
                                flash: 'flash-message',
                                visible: 'is-visible',
                                progress: 'flash-progress',
                                progress_hidden: 'is-hidden'
                            }
                        });
                        setTimeout(()=>location.reload(),1000);
                    }

                },
                error:function (error){
                    console.log(error)
                }
            })


        }


    })
    @endif
</script>
</html>
