
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Add products')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/html" href="../../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="{{url('css/font/css/all.css')}}">

    <link rel="stylesheet" href="{{url('css/Admin/css/style.css')}}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>Admin Dashboard</title>
    <style>
        a{
            text-decoration: none;
        }
        .errors{
            margin-top: 0;
            margin-bottom: -20px;
            color: red;
            opacity: 1;
            font-size: 12px;
        }
        #product-form{
            display: none;
        }
        #add_product{
            margin-bottom: 20px;
        }
        .product-form .content-product .product-form-content .input-form{
            margin-bottom: 5px;
        }
        .product-form .content-product .product-form-content .input-form button{
            max-width: 100%;
        }
        .menuBar li{
            margin-left: -30px;
        }
        .product-form {
            width: 100%;
            margin-bottom: 20px;
        }
        .product-form .content-product{
            display: flex;
            justify-content: center;

        }
        .product-form .content-product .product-form-content{
            width: 100%;
            border-bottom: 1px solid #bd0808;

        }
        table,.table,#mytable{
            width: 100%;
        }

        .table tbody tr{
            border-style: solid;
            border: 1px solid transparent;
        }
        .table tbody{
            vertical-align: initial;
        }
        #sidebar .side-menu li {
            margin-left: -26px;
        }
        #mytable_length{
            margin-bottom: 20px;
        }
        .dataTables_wrapper .dataTables_filter input{
            padding: 2px;
        }
        .dataTables_wrapper .dataTables_filter input:focus{
            outline: none;
        }
        #add_product i{
            margin-right: 5px;
            font-size: 15px;
        }
        .updateForm{
            width: 300px;
        }
    </style>
</head>
<body>
@include('layouts.Admin.sidebar')

<section id="content">

    @include('layouts.Admin.navbar')
        <main>

        <div id="myModal" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Data</h5>
                        <button type="button" class="btn btn-danger close"  id="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="product-form" >
                            <div class="content-product">
                                <div class="update-form-content" style="">
                                    <form id="updateForm"  class="updateForm" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" id="id">
                                        <div class="input-form">

                                            <label class="form-lebel">Name Product:</label>
                                            <p class="errors"></p><br>
                                            <input type="text" id="name" class="form-control" name="name" placeholder="Name Product" value="{{old('name')}}">

                                        </div>
                                        <div class="input-form">
                                            <label class="form-lebel">Category Product:</label>
                                            <p class="errors"></p><br>
                                            <select name="category" class="form-select" aria-label="Default select example">
                                                @foreach($cat as $categorie)
                                                    <option value="{{$categorie->name}}">{{$categorie->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="input-form">
                                            <label class="form-lebel">Prix Product:</label>
                                            <p class="errors"></p><br>
                                            <input type="text" id="prix" name="prix" class="form-control" placeholder="Prix Product" value="{{old('description')}}">
                                        </div>
                                        <div class="input-form">
                                            <label class="form-lebel">quantite:</label>
                                            <p id="" class="errors"></p><br>
                                            <input type="number" id="quantite"  name="quantite" class="form-control" placeholder="Quantite Product" value="{{old('quantite')}}">
                                        </div>

                                        <div class="input-form">
                                            <label class="form-lebel">Description Product:</label>
                                            <p class="errors"></p><br>
                                            <textarea class="form-control" id="description" name="description" placeholder="description" rows="3"></textarea>
                                        </div>

                                        <div class="input-form">

                                            <label >image Product:</label>
                                            <p class="errors"></p><br>
                                            <input type="file" name="image" class="form-control form-control-sm">
                                        </div>
                                        <div class="input-form">
                                            <button id="btn" class="btn btn-outline-dark" >Validate</button>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    <button id="add_product" class="btn btn-success"><i class="fa-sharp fa-solid fa-plus"></i>Add product</button>
    <div class="product-form" id="product-form">
        <div class="content-product">
            <div class="product-form-content" style="">
                <form id="myform"  class="myform" enctype="multipart/form-data">
                    @csrf
                    <div class="input-form">
                    <label class="form-lebel">Name Product:</label>
                    <p class="errors" id="error_name"></p><br>
                    <input type="text" class="form-control" name="name" placeholder="Name Product" value="{{old('name')}}">

                    </div>
                    <div class="input-form">
                    <label class="form-lebel">Category Product:</label>
                    <p id="error_category" class="errors"></p><br>
                        <select name="category" class="form-select" aria-label="Default select example">
                            @foreach($cat as $categorie)
                                <option value="{{$categorie->name}}">{{$categorie->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-form">
                    <label class="form-lebel">Prix Product:</label>
                    <p id="error_prix" class="errors"></p><br>
                    <input type="text" name="prix" class="form-control" placeholder="Prix Product" value="{{old('description')}}">
                    </div>
                    <div class="input-form">
                        <label class="form-lebel">quantite:</label>
                        <p id="error_quantite" class="errors"></p><br>
                        <input type="number" name="quantite" class="form-control" placeholder="quantite Product" value="{{old('description')}}">
                    </div>

                    <div class="input-form">
                    <label class="form-lebel">Description Product:</label>
                    <p id="error_description" class="errors"></p><br>
                        <textarea class="form-control" id="description" value="332" name="description" placeholder="description" rows="3"></textarea>
                    </div>

                    <div class="input-form">

                    <label >image Product:</label>
                    <p id="error_image" class="errors"></p><br>
                    <input type="file" name="image" class="form-control form-control-sm">
                    </div>
                    <div class="input-form">
                        <button id="btn" class="btn btn-outline-dark" >Validate</button>
                    </div>


                </form>
            </div>
        </div>
    </div>

    <div class="table-data" >
        <table class="table table-striped table-light " id="mytable" style="width: 100%; ">
            <thead class="table-dark">
            <tr>
                <td><p>name</p></td>
                <td><p>category</p></td>
                <td><p>prix</p></td>
                <td><p>quantite</p></td>
                <td><p>image</p></td>
                <td><p>slug</p></td>
                <td><p>Status</p></td>
                <td><p>supprimer</p></td>
                <td><p>Update</p></td>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>
        </main>
</section>


<script
    type="module"
    src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script src="{{url('js/jquery/jquery.js')}}"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src="{{url('js/Admin/js/script.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.4.2/tinymce.min.js"></script>
<script>


    // Initialize TinyMCE
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',

    });


    $(document).ready(function () {


        //Affiche product form
        $(document).on('click','#add_product',()=>{
            $('#product-form').slideToggle();
        })


      //Table Data Products
      var table =  $('#mytable').DataTable({
            processing: true,
            ajax: '/admin/getProduct',
            columns: [
                { data: 'nameProduct' },
                { data: 'category_name' },
                { data: 'prix' },
                {data:'quantiteStock'},
                { data: 'image',
                    "render": function (data) {
                        return '<img src="{{asset('')}}'+ data +'" width="50px" height="50px">';}
                },
                {data:'slug'},
                {data:'status',
                    "render":function (data){
                        if(data==='En stock'){
                            return `<p style="    font-size: 12px; padding: 9px 9px 7px 9px;" class='btn btn-success'>${data}</p>`
                        }
                        else{
                            return `<p style="font-size: 12px; padding: 9px 9px 7px 9px;" class='btn btn-danger'>${data}</p>`;
                        }
                    }
                }
                ,
                {
                    data:null,
                    "render":function (data,type,row){
                        return `
                               <button type='submit'  class='btn btn-danger' id='btn-delete' data-id='${row.id}'><i class="fa-solid fa-trash"></i></button>
                                `
                    }
                },
                {
                    data:null,
                    "render":function (data,type,row){
                        return `
                                    <button class='btn btn-success' id='btn-Update' data-id='${row.id}' id="update"><i class="fa-solid fa-pen"></i></button>
                                    `
                    }
                }

            ],
        });
        //END


        //Insert Product to data base
        $('#myform').submit(function(e) {
            e.preventDefault();
            var form = $('#myform')[0];
            var mydata =  new FormData(form);
            console.log(mydata)
            $.ajax({
                type: 'POST',
                url: '/admin/poduct/add',
                data: mydata,
                datatype: 'json',
                contentType:false,
                processData:false,

                success: function(data) {
                    $('#myform')[0].reset();
                    table.ajax.reload();
                    if (data.success == true){
                        document.getElementById('error_name').innerText = '';
                        document.getElementById('error_category').innerText = '';
                        document.getElementById('error_prix').innerText = '';
                        document.getElementById('error_description').innerText = '';
                        Swal.fire(
                            'Product added to dataBase',
                            'You clicked the button',
                            'success'
                        )
                    }

                    console.log(data);
                },


                error: function (data,textStatus,errorThrown){
                    if(data){
                        console.log(data.responseJSON.errors.name)

                        if(data.responseJSON.errors){


                            data.responseJSON.errors.name=== undefined ? document.getElementById('error_name').innerText = '' :  document.getElementById('error_name').innerText =  data.responseJSON.errors.name;
                            data.responseJSON.errors.category=== undefined ? document.getElementById('error_category').innerText = '' :  document.getElementById('error_category').innerText = data.responseJSON.errors.category ;
                            data.responseJSON.errors.quantite=== undefined ? document.getElementById('error_quantite').innerText = '' :  document.getElementById('error_quantite').innerText = data.responseJSON.errors.quantite ;
                            data.responseJSON.errors.prix=== undefined ? document.getElementById('error_prix').innerText = '' :  document.getElementById('error_prix').innerText = data.responseJSON.errors.prix ;
                            data.responseJSON.errors.description=== undefined ? document.getElementById('error_description').innerText = '' :  document.getElementById('error_description').innerText = data.responseJSON.errors.description ;
                            data.responseJSON.errors.image=== undefined ? document.getElementById('error_image').innerText = '' :  document.getElementById('error_image').innerText = data.responseJSON.errors.image ;
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }

                }
            });
        });
//end Code insert data


//DELETE USING AJAX
        $(document).on('click','#btn-delete',function(event){
            event.preventDefault()
            let idDelete = $(this).data('id');
            console.log(idDelete)
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/admin/product/delete/'+idDelete,
                        data:{"_token":"{{csrf_token()}}"},
                        datatype: 'json',
                        success: function(data) {
                            if(data.message===true){
                                table.ajax.reload();
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            }
                        },
                        error:function (error){
                            console.log(error)
                        }
                    })

                }
            })
        })
        //END DELETE USING AJAX

        //UPDATE WITH AJAX
        $('#close').click(function(){
            $('#myModal').modal('hide')
        });


        $(document).on('click','#btn-Update',(function (e){
            e.preventDefault()
            $("#myModal").modal('show');
            var id = $(this).data('id');
            console.log(id)
            $.ajax(
                {
                    url: '/admin/product/edit/'+id,
                    type: 'PUT',
                    data:{"_token":"{{csrf_token()}}"},
                    datatype: 'json',
                    success: function (data){
                        console.log(data)
                        data.productData.forEach(function(info){
                            console.log(info)
                            $('#id').val(info.id);
                                $('#name').val(info.nameProduct);
                                $('#prix').val(info.prix);
                                $('#quantite').val(info.quantiteStock);
                                $('#category').val(info.category_name);
                                $('#description').val(info.description);
                            }
                        )

                    },
                    error: function (error){
                        console.log(error)
                    }

                }
            )

        }));
        $('#updateForm').submit(function (e){
            e.preventDefault();

            let updateData = new FormData($('#updateForm')[0]);
            $.ajax({
                type:"POST",
                url:'/admin/product/update',
                data:updateData,
                datatype:'json',
                contentType:false,
                processData:false,

                success: function(data) {
                    console.log(data.data)
                    $('#updateForm')[0].reset();
                    table.ajax.reload();
                    if (data.success == true){
                        document.getElementById('error_name').innerText = '';
                        document.getElementById('error_category').innerText = '';
                        document.getElementById('error_prix').innerText = '';
                        document.getElementById('error_description').innerText = '';
                        Swal.fire(
                            'Product updated',
                            'You clicked the button',
                            'success'
                        )
                        $("#myModal").modal('hide');
                    }

                    console.log(data);
                },
                error: function (data,textStatus,errorThrown){
                    if(data){
                        console.log(data.responseJSON.errors.name)

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }

                }

            })

        })
    });
    //UPDATE WITH AJAX





</script>

<script src="{{url('js/Admin/js/script.js')}}"></script>
</body>
</html>
