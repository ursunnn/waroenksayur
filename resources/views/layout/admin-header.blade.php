<header>
    <nav class="navbar navbar-expand-lg" style="background-color: #020202">
        <div class="container">
            <div class="d-flex flex-column align-items-center mb-lg-0">
                {{-- <img src="{{ url('/'.'data_file/logo.png') }}" alt="logo" width="25px" height="25px"> --}}
                <a class="navbar-brand text-white" href="{{ route('home')}}">
                    <img src="{{ url('/'.'data_file/logo.png') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    Waroenk Sayur</a>
            </div>
            <ul class="navbar-nav me-center mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('music_list') }}">Manage Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('create_category') }}">Add Category</a>
                </li>
            </ul>
            <ul class="navbar-nav me-right">
                <div class ="d-flex flex-column align-items-center mb-lg-0 justify-content-center">
                    <li class="nav-item ">
                        <p class="text-center text-white">{{Auth::user()->role}}</p>
                    </li>
                    <li class="nav-item">
                        <a class="text-secondary " href="{{ route('profile') }}" style="text-decoration: none">View Profile</a>
                    </li>
                </div>
            </ul>
        </div>
    </nav>
</header>
