<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>
    <link rel="stylesheet" type="text/html" href="../../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/font/css/all.css')}}">

    <link rel="stylesheet" href="{{url('css/Admin/css/style.css')}}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
    #sidebar .side-menu li {
        margin-left: -26px;
    }
    

    select,select:focus,select:active,select:focus-visible{
        background: transparent;
        border: none;
        outline: none;
        text-align: center;
    }
    option{
        padding: 10px;
        border: none;
    }
    table{
        text-align: center;
    }
    .modal-content{
        max-width: 700px;
        width: 700px;
    }
    .paginate{
        background-color: transparent;
    }
    .paginate nav{
        background-color: transparent;
    }
    .paginate nav:before{
        content: "";
        background-color: transparent;
        box-shadow: none;
    }
</style>
<body>
@include('layouts.admin.sidebar')
<section id="content">
    @include('layouts.admin.navbar')
    <main>

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


        <div>
            <div>
                <form style="display: flex;gap: 40px;margin-bottom: 40px" action="{{url('admin/orders')}}" method="post">
                    @csrf
                    <select name="status">
                        <option   value="pending">pending</option>
                        <option   value="confirmed">confirmed</option>
                        <option   value="delivered">Delivered</option>
                        <option   value="canceled">canceled</option>
                    </select>
                    <button class="btn btn-outline-success">Search</button>
                </form>

            </div>
        </div>
        @if(isset($DeletedOrders))
            <table class="table table-tripted">
                <thead class="table-dark">
                <tr>
                    <td>Num Order</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>status</td>
                    <td>date order</td>
                    <td>full Name</td>
                    <td>Total</td>
                </tr>
                </thead>
                @foreach($DeletedOrders as $order)
                    <tr>
                    <td>{{$order->order_number}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->order_date}}</td>
                    <td>{{$order->fullName}}</td>
                        <td>{{$order->total}}</td>
                    </tr>
                @endforeach
        @elseif(isset($orders))
        <table class="table table-tripted">
            <thead class="table-dark">
            <tr>
                <td>Num Order</td>
                <td>Email</td>
                <td>Phone</td>
                <td>status</td>
                <td>quantite</td>
                <td>full Name</td>
                <td>Total</td>
                <td>view</td>
            </tr>
            </thead>



            @foreach($orders as $order)
            <tr>
                <td>{{$order->numero}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->phone}}</td>
                <td class="status myselect" ><select @if($order->status== 'confirmed' )
                                                        style="color: #fff;
                                                        border: 1px solid green;
                                                        padding: 2px;
                                                        background-color: green;
                                                        border-radius: 25PX;"
                                                     @elseif($order->status== 'pending')
                                                        style="color: #fff;
                                                        border: 1px solid #FF7F50;
                                                        padding: 2px;
                                                        background-color: #FF7F50;
                                                        border-radius: 25PX;"
                                                     @elseif($order->status== 'delivered')
                                                         style="color: #fff;
                                                        border: 1px solid #83299b;
                                                        padding: 2px;
                                                        background-color: #83299b;
                                                        border-radius: 25PX;"
                                                     @else
                                                        style="color: #fff;
                                                        border: 1px solid red;
                                                        padding: 2px;
                                                        background-color: red;
                                                        border-radius: 25PX;"
                                                     @endif data-order="{{$order->numero}}"
                                                     id="statusSelect" class="statusSelect">
                        <option  style="color: #fff" @if($order->status == 'pending')  selected @endif value="pending">pending</option>
                        <option  style="color: #fff" @if($order->status == 'confirmed')  selected @endif value="confirmed">confirmed</option>
                        <option  style="color: #fff" @if($order->status == 'delivered')  selected @endif value="delivered">Delivered</option>
                        <option  style="color: #fff" @if($order->status == 'canceled')  selected @endif value="canceled">canceled</option>
                    </select>
                </td>
                <?php
                    $totalQuantity = 0;
                    foreach ($order->products as $product) {
                        $quantity = $product->pivot->quantite;
                        $totalQuantity += $quantity;
                    }
                    $order->totalQuantity = $totalQuantity;
                    ?>
                <td>{{$order->totalQuantity}}</td>
                <td>{{$order->fullName}}</td>
                <td>{{$order->total}} MAD</td>
                <td id="view" data-order="{{$order->numero}}"><i style="color: green;text-align: center;width: 100%; cursor: pointer" class="fa-solid fa-eye"></td>
            </tr>
            @endforeach
        </table>

        <div class="paginate d-flex justify-content-center" style="margin-top: 30px">
            {!! $orders->links() !!}
        </div>
        @endif
    </main>
</section>
</body>
<script
    type="module"
    src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script src="{{url('js/jquery/jquery.js')}}"></script>
<script src="{{url('js/Admin/js/script.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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


        $(document).on('change','#statusSelect', function() {
            let newStatus = $(this).val(); // Get the newly selected status
            console.log(newStatus)
            let ordernum = $(this).data('order')
            console.log(ordernum)

            $.ajax({
                url: '{{url('admin/order/update')}}',
                type: 'POST',
                data: {
                    status: newStatus,
                    orderNumero: ordernum,
                    _token: '{{ csrf_token() }}' // Include the CSRF token for Laravel form protection
                },
                success: function(response) {
                    console.log(response)
                    // Handle the successful response
                    if(response.message==true){
                        console.log('Status updated successfully');
                        setInterval(()=>{location.reload()},1000)
                    }

                },
                error: function(xhr) {
                    // Handle the error response
                    console.log(xhr)
                    console.log('Error updating status');
                }
            });
        });
    })
</script>
</html>
