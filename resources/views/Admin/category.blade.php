<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Categories')</title>
    <link rel="stylesheet" type="text/html" href="../../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/font/css/all.css')}}">


    <link rel="stylesheet" href="{{url('css/Admin/css/style.css')}}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>Admin Dashboard</title>
    <style>
        #sidebar .side-menu li {
            margin-left: -26px;
        }
        .errors{
            color: red;
            font-size: 13px;
            margin-bottom:0;
        }
    </style>
<body>
@include('layouts.Admin.sidebar')

<section id="content">

    @include('layouts.Admin.navbar')
    <main>

        <div id="myModal" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Category</h5>
                        <button type="button" class="btn btn-danger close"  id="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="product-form" >
                            <div class="content-product">
                                <div class="update-form-content" style="">
                                    <form id="updateForm"  class="updateForm" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="oldName" id="old_name">
                                        <div class="input-form">
                                            <label class="form-lebel">Name Category:</label>
                                            @error('name')
                                            <p class="errors" id="error_name">
                                                {{$message}}
                                            </p>
                                            @enderror
                                            <input id="name_cat" style="max-width: 600px" type="text" class="form-control" name="name" placeholder="Name Category" value="{{old('name')}}"><br>
                                            <button type="submit" class="btn btn-outline-success">Update Category</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <form method="post" action="{{url('admin/add_category')}}">
            @csrf
            <div class="input-form">
                <label class="form-lebel">Name Category:</label>
                @error('name')
                <p class="errors" id="error_name">
                    {{$message}}
                </p>
                @enderror
                <input style="max-width: 600px" type="text" class="form-control" name="name" placeholder="Name Category" value="{{old('name')}}"><br>
                <button type="submit" class="btn btn-outline-success">Add Category</button>
            </div>
        </form>

        <table style="margin-top: 40px" class="table table-striped table-ligth">
            <thead class="table-dark">
            <tr>
                <td>Name category</td>
                <td>Delete</td>
                <td>Update</td>
            </tr>
            </thead>
            @foreach($category as $cat)
            <tr>
                <td>{{$cat->name}}</td>
                <td><button type='submit'  class='btn btn-danger' id='btn-delete' data-name='{{$cat->name}}'><i class="fa-solid fa-trash"></i></button></td>
                <td><button type='submit'  class='btn btn-danger' id='btn-update' data-name='{{$cat->name}}'><i class="fa-solid fa-pen"></i></button></td>
            </tr>
            @endforeach
        </table>
    </main>




</section>

</body>
<script
    type="module"
    src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script src="{{url('js/jquery/jquery.js')}}"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src="{{url('js/Admin/js/script.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(session('status')=='Added')
    Swal.fire(
        'Category added to dataBase',
        'You clicked the button',
        'success'
    )
    @endif
    @if(session('status')=='Error')
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Something went wrong!',
    })
    @endif

    $(document).ready(function (){
        $(document).on('click','#btn-delete',function (){
            let name = $(this).data('name')

            Swal.fire({
                title: 'Are you sure?',
                text: "You wont to delete this category!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                            type: 'DELETE',
                            url: '/admin/category/delete/' + name,
                            data: {"_token": "{{csrf_token()}}"},
                            datatype: 'json',
                            success: function (data) {
                                if (data.message === true) {

                                    Swal.fire(
                                        'Deleted!',
                                        'The category ' + data.cat.name + ' has been deleted.',
                                        'success'
                                    )
                                    setTimeout(() => {
                                        location.reload()
                                    }, 2000)
                                }
                            },
                            error: function (error) {
                                if (error) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Something went wrong!',
                                    })
                                }
                            }
                        }
                    )
                } })})

        $('#close').click(function(){
            $('#myModal').modal('hide')
        });

        $(document).on('click','#btn-update',function (){
            $('#myModal').modal('show')
                let name  = $(this).data('name')
            $.ajax(
                {
                    url: '/admin/category/edit/'+name,
                    type: 'PUT',
                    data:{"_token":"{{csrf_token()}}"},
                    datatype: 'json',
                    success: function (data){
                        if(data.message == true){
                            $('#old_name').val(data.category.name)
                            $('#name_cat').val(data.category.name)
                        }
                    }
                }
            )
        })
        $('#updateForm').submit(function (e){
            e.preventDefault();
            let data = $(this).serialize();
            console.log(data);
            $.ajax({
                type:'POST',
                url:'/admin/category/update',
                data:data,
                datatype:'json',
                success:function (msg) {
                    if(msg.message==true){
                        Swal.fire(
                            'Updated!',
                            'The category Updated.',
                            'success'
                        )
                        setTimeout(()=>location.reload(),2000)
                    }
                    else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }
                }
            })
        })
    })

</script>

</html>
