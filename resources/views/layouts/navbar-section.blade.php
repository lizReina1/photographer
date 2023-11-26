<div>
<header id="header" class=" content-light ">
<div class="header-wrap container py-3">
            <div class="row align-items-center">
                <div class="primary-nav col-md-5 col-sm-2">
                    <nav class="navbar">
                        <div class="main-menu">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <div class="card" style="width: 6rem;">
                                    <img src="images/logo.jpg" class="card-img-top" alt="Logo">
                                    
                                </div>
                            </a>
                        </div>
                    </nav>
                </div>
                <div class="right-block col-md-5 col-sm-4 position-absolute top-3 end-0 mt-2">
                    <nav class="navbar justify-content-end">
                        <div class="user-items">
                            <ul class="list-unstyled content-light d-flex align-items-center m-0">
                                
                                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                                @if (Route::has('login'))

                                @auth
                                <li> <a class="nav-link" href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a> </li>
                                @else
                                <li> <a class="nav-link" href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"><i class="icon icon-user"></i> Log in</a></li>

                                @if (Route::has('register'))
                                <li> <a class="nav-link" href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a> </li>
                                @endif
                                @endauth
                                @endif

                                <li>
                                    <a href="#" class="cart for-buy">
                                        <i class="icon icon-shopping-cart"></i>
                                        <span>(0)</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
</header>

</div>