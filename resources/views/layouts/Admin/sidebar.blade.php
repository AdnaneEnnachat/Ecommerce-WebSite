
<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">GAMING FOR YOU</span>
    </a>
    <ul class="side-menu top">
        <li class="">
            <a href="{{url('/admin/dash')}}">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{url('/admin/produit')}}">
                <i class='bx bxl-product-hunt'></i>
                <span class="text">Product</span>
            </a>
        </li>
        <li>
            <a href="{{url('/admin/category')}}">
                <i class='bx bx-category'></i>
                <span class="text">Category</span>
            </a>
        </li>
        <li>
            <a href="{{url('/admin/orders')}}">
                <i class='bx bx-clipboard'></i>
                <span class="text">Orders</span>
            </a>
        </li>
        @if(Auth::guard('admin')->user()->role!=='admin')
        <li>
            <a href="{{ url('/admin/register') }}">
                <i class='bx bx-user'></i>
                <span class="text">Admins</span>
            </a>
        </li>
        @endif
    </ul>
    <ul class="side-menu">
        <li>
            <a href="#">
                <i class='bx bxs-cog' ></i>
                <span class="text">Settings</span>
            </a>
        </li>
        <li>
            <form method="post" action="{{route('admin.logout')}}">
                @csrf

                    <button style="border: none;color: red ;background-color: transparent;" class="text">
                        <a class="logout">
                            <i class='bx bxs-log-out-circle' ></i>
                        Logout</a></button>

            </form>

        </li>
    </ul>
</section>

