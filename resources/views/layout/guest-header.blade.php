<header>
    <nav class="navbar navbar-expand-lg bg-success bg-opacity-75">
        <div class="container">
            <div class="d-flex flex-column align-items-center mb-lg-0">
                <a class="navbar-brand text-white" href="{{ route('home')}}">
                    <img src="{{ url('/'.'data_file/logo.png') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    Waroenk Sayur</a>
            </div>
            <ul class="navbar-nav me-center mb-2 mb-lg-0">
                <li class="nav-item " >
                    <a class="nav-link text-white" aria-current="page" href="{{ route('about_us') }}">About us</a>
                 </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('music_list') }}">Products</a>
                </li>
            </ul>
            <ul class="navbar-nav me-right mb-2 mb-lg-0">
                <li class="nav-item ">
                    <a class="btn btn-outline-light me-2 rounded-5" href="{{ route('index_login') }}">Sign in</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-light rounded-5" href="{{ route('index_register') }}">Sign up</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
