
<nav>
    <i class='bx bx-menu' ></i>
    <a href="#" class="nav-link">Order number</a>
    <form action="{{url('admin/orders')}}" method="post">
        @csrf
        <div class="form-input">
            <input name="order_num" type="search" placeholder="Search...">
            <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
        </div>
    </form>


</nav>

