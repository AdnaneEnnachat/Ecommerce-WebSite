//panier
let panier = document.getElementById('panier');
    let mycart = document.getElementById('mycart');
    panier.addEventListener('mouseover', function(){
        mycart.style.opacity = '1';
        mycart.style.zIndex = '10';
        mycart.addEventListener('mouseover', function(){
            mycart.style.opacity = '1';
        mycart.style.zIndex = '10';
        })
        mycart.addEventListener('mouseout', function(){
            mycart.style.opacity = '0';
        mycart.style.zIndex = '-1';
        })
    })
    panier.addEventListener('mouseout', function(){
        mycart.style.opacity = '0';
        mycart.style.zIndex = '-1';
    })
//end panier


//slider of products
$(document).ready(function (){

    $('.image-pub').slick({
        infinite:true,
        autoplay:true,
        slidesToShow:1,
        dots: false,
        arrows:false,
        autoplaySpeed: 1000,
    })
    $('.main-slider').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        dots:false,
        prevArrow:'<i class="fa-solid fa-arrow-left left-arrow"></i>',
        nextArrow: '<i class="fa-solid fa-arrow-right right-arrow"></i>',
        responsive: [
            {
                breakpoint:1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 990,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 780,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
        ]
    });
});

    function SaveCart(cart){
        localStorage.setItem('cart',JSON.stringify(cart))
    }
    function getCart(){
        let cart = localStorage.getItem('cart');
        if(cart == null){
            return []
        }
        else{
            return JSON.parse(cart)
        }
    }
    function addCart(product){
        let cart = getCart()
        let presentProduct = cart.find(p => p.id == product.id);
        if(presentProduct != undefined){
            presentProduct.quantity++
        }
        else {
            product.quantity = 1
            cart.push(product)
        }
        SaveCart(cart)
    }
     function  removeProduct(id){
            let cart = getCart();
            cart = cart.filter(p => p.id != id);
            SaveCart(cart);

        }
        function  clearCart(){
        let cart = getCart()
            cart = [];
        SaveCart(cart)
        }
        function updateQuantity(id,quantity){
            let cart = getCart();
            let presentProduct = cart.find(p => p.id == id);
            if(presentProduct != undefined){
                presentProduct.quantity = quantity
                if(presentProduct.quantity<=0){
                    removeProduct(id)
                }
                else{
                    SaveCart(cart)
                }
            }
        }
        function getNumberProduct(){
            let cart = getCart()
            let number = 0;
            for(let i = 0;i<cart.length ;i++){
                number += parseInt(cart[i].quantity)
            }
            return number
        }
        function  totalPrice(){
            let cart = getCart()
            let Total = 0;
            for(let i = 0;i<cart.length ;i++){
                Total += cart[i].quantity * cart[i].prix
            }
            return Total
        }


function refreshPanier(){
    let products = getCart()

    if(products.length<1){
        $('#mycart').html(`<p class='cart-empty'>no product in the cart</p>`)
    }
    let totalPrix = totalPrice()
    let numberProduct = getNumberProduct()

    $('.count-panier').text(getNumberProduct());
    if(products.length>0){
        products.forEach((items,)=>{

            const content = `<div class='content-cart' >
                                        <div class="first-content-cart" style="display: flex">
                                        <img src="../../../${items.image}" alt="" width="50px" height="50px">
                                        <p style="font-size: 15px; margin-left: 10px; color: #83299b;">${items.nameProduct}</p>
                                        <p style="  cursor: pointer; display: flex;
                                                    margin-left: auto;
                                                    margin-right: 30px;
                                                    font-size: 22px;
                                                    align-items: center;
                                                    color: #000000a8;" id='remove-product' data-id='${items.id}'><i class="fa-solid fa-xmark"></i></p>
                                        </div>
                                        <p style="color: #83299b;margin: -25px 0 -9px 61px;font-size: 14px;font-weight: 700;" class='cart-price'>${items.quantity}*${items.prix} MAD<p>
                                    </div>`
           document.getElementById('mycart').innerHTML += content;




        })

        const footerCart = `<div style="display: flex"><p style="font-size: 20px;font-weight: 600; padding: 0; margin: 0;">Sous-Total:</p>
                                    <p style=" font-size: 17px;  padding: 0; margin: 0; color: red;font-weight: 100;margin-left: 60px;display: flex;    align-items: end;margin-left: auto;margin-right: 30px;">${totalPrix},00 MAD</p>
                                    </div>
                                <div style="display: flex; margin-top: 30px;gap: 14px;">
                                <div style="width: 90%; display: flex; padding: 12px 12px;margin-bottom: 10px;border-radius: 5px;justify-content: center; align-items: center;border: 1px solid #12032a;background-color: #12032a;">
                                    <a href="/panier" style="font-weight: 600;  color: #fff; font-size: 15px" type="submit">Panier</a>
                                    </div>
                                    <div style="width: 90%; display: flex;padding: 12px 12px;margin-bottom: 10px;border-radius: 5px; justify-content: center; align-items: center;border: 1px solid #12032a;background-color: #12032a;">
                                    <a href="/check" style="font-weight: 600; color: #fff;font-size: 15px; padding: 0; margin: 0">CHECK OUT</a></div>
                                      <div>`
        $('#mycart').append(footerCart)
    }
}





        $(document).ready(function (){
            document.getElementById('mycart').innerHTML = '';
            refreshPanier()

            $(document).on('click','#remove-product',function (){

                let id = $(this).data('id')
                removeProduct(id)
                location.reload()
            })

        })

//End slider of products
