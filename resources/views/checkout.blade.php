@extends('layout.master')
@section('title', 'Waroenk Sayur | Checkout')

@section('content')
@if ($message=Session::get('alert'))
    <script type="text/javascript">alert( '{{ $message }}')</script>
@endif
    <h3 class="text-3xl text-bold ms-5 mt-3">Check Out</h3>
    <div class="container d-flex justify-content-center flex-column mb-5 mt-3">
        <table class="table">
            <thead class="bg-dark text-light">
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Subtotal</th>
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
                            <input type="number" id="quantity" name="quantity" value="{{ $header[$i]->quantity }}" max="{{ $item->stock }}" min="0" class="text-center" disabled/>
                        </form>
                    </div>
                </td>
                <td>
                    <span class="d-flex align-items-center mt-4">
                       IDR {{ $header[$i]->subtotal }}
                    </span>
                </td>
            </tr>
            <?php $sum= $sum+ $header[$i]->subtotal ;$i++?>
            @endforeach
            </tbody>
        </table>
        <div class=" d-flex justify-content-between">
            User Address: {{ Auth::user()->address }}
            <div class="align-self-end">
                <b>IDR {{ $sum }}</b>
            </div>
        </div>
        <div class="align-self-end">
            <form action="/cart/checkout/{{ $passcode }}" method="POST">
                @csrf
                <div class="d-flex flex-column align-items-end">
                    <label class="mb-2 mt-1" for="passcode">Please Enter the Following Passcode to Checkout : <b>{{ $passcode }} </b></label>
                    <input type="text" name="passcode" id="passcode" style="min-width: 100%" class="mb-2">
                    @error('passcode')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                    @if ($message=Session::get('error'))
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <button class="btn btn-primary" style="min-width: 100%">Check Out</button>
                </div>
                </form>
        </div>
    </div>
    @endsection
