<link rel="stylesheet" href="{{url('css/styles/navbar.css')}}">


<header>
    <!-- first navbar -->
    <div style="background-color: #12032a;">
        <div class="first-nav container-xxl">
            <div class="service-nav">
                <div class="first-one">
                    <i class="fa-solid fa-mobile"></i>
                    <span>Mobile:</span>
                    <a href="https://wa.link/iq0sze">+212613721007</a>
                </div>
                <div class="seconde-one">
                    <i class="fa-regular fa-envelope"></i>
                    <span>Email:</span>
                    <a href="mailto:GAMING4YOU@contact.ma">GAMING4YOU@contact.ma</a>
                </div>
            </div>
            <div class="media-nav">
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
            </div>
        </div>
    </div>
    <!--end first navbar -->
    <!-- SECONDE navbar -->
    <div style="background-color: #12032a; border-top:1px solid #83299b;">
        <nav class="second-nav container-xxl">
            <div class="navbar-section">
                <div class="logo">
                    <a href="/"><img src="{{asset('logo/logo.png')}}" height="100" width="100"></a>
                </div>
                <div class="search-section">
                    <form action="{{url('/search')}}" method="post">
                            @csrf
                        <select name="categorie">
                            @php
                                $categories = DB::select('SELECT * FROM categories');
                            @endphp
                            @foreach($categories as $cate)
                            <option value="{{$cate->name}}">{{$cate->name}}</option>
                            @endforeach
                        </select>
                        <input type="text" name="product" placeholder="Search">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="profile">
                    <div class="all-cart">
                        <div class="carts-info">
                            <a href="{{url('panier')}}" id="panier"><i class="fa-solid fa-basket-shopping"></i>
                                <span class="count-panier">0</span>
                            </a>
                        </div>
                        <div class="panier" >
                            <div class="cart">
                                <div class="cart-content" id="mycart">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div><a href="/profile"><i class="fa-regular fa-user"></i></a></div>

                </div>
            </div>
        </nav>
    </div>

    <nav class="navbar navbar-expand-md navbar-light ">
        <div class="container-xxl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="menu"><i class="fa-solid fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            COMPONENTS
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{url('boutique/categorie/GRAPHIC CARD')}}">Graphics Cards</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{url('boutique/categorie/MOTHERBOARD')}}">MotherBoard</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{url('boutique/categorie/CPU')}}">CPU</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{url('boutique/categorie/RAM')}}">RAM Memory</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{url('boutique/categorie/PSU')}}">Power Supply</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{url('boutique/categorie/CASE')}}">Case</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            PERIPHERIQUES
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{url('boutique/categorie/MONITEUR')}}">MONITEURS</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{url('boutique/categorie/CASQUE')}}">CASQUES</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{url('boutique/categorie/MOUSE')}}">MOUSE</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{url('boutique/categorie/KEYBOARD')}}">KEYBOARD</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{url('boutique/categorie/TAPI')}}">TAPI</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('boutique/categorie/PC GAMER')}}">PC GAMER</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('boutique/categorie/LAPTOP')}}">LAPTOP</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->
    <!-- last nav bar-->
</header>

