@extends('layout.master')
@section('title', 'Waroenk Sayur | Products')
@section('content')

@if ($message=Session::get('alert'))
    <script type="text/javascript">alert( '{{ $message }}')</script>
@endif


<div class="container-fluid" style="min-width: 83vh;">
    <div class="container display-6 mb-2 pb-1">
        <div class="d-flex justify-content-between mt-3">
            <h1>Our Products</h1>
            <div class="d-flex align-items-center">
                <form class="d-flex my-2 my-lg-0" method="get" action="{{ route('search_music') }}">
                    <input name="search" class="form-control me-2" type="search" placeholder="Search">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
                @if(\Illuminate\Support\Facades\Auth::check())
                    @if (\Illuminate\Support\Facades\Auth::user()->role == 'Admin')
                        <a class="btn btn-primary ms-2" href="{{ route('create') }}">Insert Product</a>
                    @endif
                @endif
            </div>
        </div>
    </div>
    @if (count($products)==0)
        <div style="min-height: 73vh" class="d-flex justify-content-center align-items-center">
            <span><b>No Product Match for '{{ $query }}'</b></span>
        </div>
    @else
    <div class="container d-flex flex-wrap justify-content-center">
        @foreach ($products as $p)
        <div class="card m-2 p-1" style="width: 18rem; background-color: #f3eff5">
            <div class="card-body d-flex flex-column justify-content-center align-items-center" style="transform: rotate(0);">
            <img src="{{ url('/'.'data_file/'.$p->image) }}" class="card-img-top" alt="product image">
                <h5 class="card-title">{{ $p->title }}</h5>
                <p class="card-text">{{ $p->price }}</p>
                @if ($p->Category->id === 1)
                <p class="card-text btn btn-primary rounded-5">{{ $p->Category->name}}</p>
                    @elseif ($p->Category->id === 2)
                    <p class="card-text btn btn-success rounded-5" >{{ $p->Category->name}}</p>
                    @elseif ($p->Category->id === 3)
                    <p class="card-text btn btn-warning rounded-5">{{ $p->Category->name}}</p>
                    @elseif ($p->Category->id === 4)
                    <p class="card-text btn btn-info rounded-5">{{ $p->Category->name}}</p>
                    @elseif ($p->Category->id === 5)
                    <p class="card-text btn btn- rounded-5">{{ $p->Category->name}}</p>
                @endif

                <a href="/details/{{ $p->id }}" class="stretched-link"></a>
            </div>
            <hr>

            <div class="d-flex justify-content-between mb-2">
                @if(\Illuminate\Support\Facades\Auth::check())
                    @if (\Illuminate\Support\Facades\Auth::user()->role == 'Admin')
                        <a class="btn btn-primary rounded-5" href="/admin/edit/{{$p->id}}">Edit Product</a>
                        <form action="/admin/delete/{{ $p->id }}" method="POST">
                            @csrf
                            <button class="btn btn-danger rounded-5" type="submit"> Remove product</button>
                        </form>
                    @else
                        @if ($p->stock >0)
                            <form action="cart/add/{{ $p->id }}" method="POST">
                                @csrf
                                <button class="btn btn-primary rounded-5">Add to cart</button>
                            </form>
                        @else
                            <button class="btn btn-danger rounded-5">Sold Out</button>
                        @endif
                    @endif
                @else
                    @if ($p->stock > 0)
                        <form action="cart/add/{{ $p->id }}" method="POST">
                            @csrf
                            <button class="btn btn-primary rounded-5">Add to cart</button>
                        </form>
                    @else
                        <button class="btn btn-danger rounded-5">Sold Out</button>
                    @endif
                @endif
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center" style="margin: 2rem">
        {{$products->links()}}
    </div>
</div>
@endif
@endsection
