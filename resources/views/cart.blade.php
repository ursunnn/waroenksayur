@extends('layout.master')
@section('title', 'Waroenk Sayur | cart')

@section('content')
@if ($message=Session::get('alert'))
    <script type="text/javascript">alert( '{{ $message }}')</script>
@endif
@if (count($cartItems)==0)
<div style="min-height: 83vh" class="d-flex justify-content-center align-items-center">
    <span><b>Your Cart is Empty!</b></span>
</div>
@else
    <h3 class="text-3xl text-bold ms-5 mt-3">Your Cart</h3>
    <div class="container d-flex justify-content-center flex-column mb-5 mt-3">
        <table class="table">
            <thead class="bg-dark text-light">
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Remove</th>
                </tr>
                </thead>
            <tbody>
            <?php $i = 0;$sum=0?>
                @foreach ($cartItems as $item )
            <tr >
                <td class="border-end">
                <a href="../details/{{ $item->id }}" class="d-flex align-items-center justify-content-evenly link-dark" style="text-decoration: none">
                    <img src="{{ url('/'.'data_file/'.$item->image) }}" class="w-20 rounded" alt="Thumbnail" width="100">
                    <p class="mb-2 md:ml-4">{{ $item->title }}</p>
                </a>
                </td>
                <td>
                    <span class="d-flex align-items-center mt-4">
                        IDR {{ $item->price }}
                    </span>
                </td>
                <td>
                    <div class="d-flex align-items-center mt-4">
                        <form action="/cart/update/{{ $header[$i]->id }}" method="post">
                            @csrf
                            <input type="number" id="quantity" name="quantity" value="{{ $header[$i]->quantity }}" max="{{ $item->stock }}" min="0" class="text-center" />
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </td>
                <td>
                    <span class="d-flex align-items-center mt-4">
                        IDR {{ $header[$i]->subtotal }}
                    </span>
                </td>
                <td>
                    <div class="d-flex align-items-center mt-4">
                        <form action="/cart/delete/{{ $header[$i]->id }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $item->id }}" name="id">
                            <button class="btn btn-danger">x</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php $sum= $sum+ $header[$i]->subtotal ;$i++?>
            @endforeach
            </tbody>
        </table>
        <div class="align-self-end">
            <b>IDR {{ $sum }}</b>
        </div>
        <div>
            <a href="{{ route('index_checkout') }}" class="btn btn-primary">Check Out</a>
        </div>
    </div>
    @endif
    @endsection
