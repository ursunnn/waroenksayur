<header>
    <nav class="navbar navbar-expand-lg bg-success bg-opacity-50">
        <div class="container">
            <div class="d-flex flex-column align-items-center mb-lg-0 justify-content-center">
                <a class="navbar-brand text-white" href="{{ route('home')}}">
                    <img src="{{ url('/'.'data_file/logo.png') }}" alt="Logo" width="26" height="24" class="d-inline-block align-text-top">
                    Waroenk Sayur</a>
            </div>
            <ul class="navbar-nav me-center mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('about_us') }}">About us</a>
                 </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('music_list') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index_transaction') }}">My Transaction</a>
                </li>
            </ul>
            <ul class="navbar-nav me-right mb-2 mb-lg-0">
                <li class="nav-item me-5">
                    <a class="nav-link" href="{{ route('index_cart') }}">Cart</a>
                </li>
                <div class ="d-flex flex-column align-items-center mb-lg-0 justify-content-center">
                    <li class="nav-item ">
                        <p class="text-center">{{Auth::user()->role}}</p>
                    </li>
                    <li class="nav-item">
                        <a class="text-secondary" href="{{ route('profile') }}" style="text-decoration: none">View Profile</a>
                    </li>
                </div>
            </ul>
        </div>
    </nav>
</header>
