<nav class="navbar bg-primary navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('logo.png') }}" alt="logo" width=120 />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-evenly align-items-center" id="navbarSupportedContent">
        <ul class="navbar-nav mx-3 mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <a class="btn  dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('show-products',['category'=>'laptop']) }}">Laptops</a></li>
                        <li><a class="dropdown-item" href="{{ route('show-products',['category'=>'smartphone']) }}">Smartphones</a></li>
                        <li><a class="dropdown-item" href="{{ route('show-products',['category'=>'desktop']) }}">Desktops</a></li>
                    </ul>
                </div>
            </li>
            @if(Auth::check())
                @if(Auth::user()->is_seller)
                    <li class="nav-item">
                    <a class="nav-link active" href="{{ route('product-form') }}">Add New Product</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="{{ route('show-seller-products') }}">Show Added Products</a>
                    </li>
                @endif
            @endif
            <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li> -->
            <!-- <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li> -->
        </ul>
        <form class="d-flex" role="search" action="{{ route('search-product') }}">
            {{-- @csrf --}}
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
        </form>
        <ul class="navbar-nav d-flex justify-content-center">
            @if(auth()->guest())
            <li class="nav-item mx-2 my-2">
            <a class="btn btn-success" aria-current="page" href="{{ route('login-form') }}">Login</a>
            </li>
            <li class="nav-item mx-2 my-2">
            <a class="btn btn-success" aria-current="page" href="{{ route('signup-form') }}">SignUp</a>
            </li>
            @endif
            @if(auth()->check())
            <li class="mx-2 my-2">
                <form action="{{ route('user-logout') }}" method="post" class="d-flex" role="search">
                    @csrf
                    <button class="btn btn-success" type="submit">Logout</button>
                </form>
            </li>
            <li class="mx-2 my-2">
                <a class="btn btn-success" aria-current="page" href="{{ route('user-cart-details-get') }}">Show Cart</a>
            </li>
            <li class="mx-2 my-2">
                <a class="btn btn-success" aria-current="page" href="{{ route('show-orders') }}">Show Orders</a>
            </li>
            @endif
        </ul>
        @if(Auth::check())
        <div class="profile">
            <h3 class="text-white text-uppercase fw-medium font-monospace">{{ Auth::user()->name }}</h3>
        </div>
        @endif
        </div>
    </div>
</nav>
