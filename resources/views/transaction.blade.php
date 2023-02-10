@extends('layout.master')
@section('title', 'Waroenk Sayur | Transaction History')

@section('content')
@if ($message=Session::get('alert'))
    <script type="text/javascript">alert( '{{ $message }}')</script>
@endif
@if (count($history)==0)
<div style="min-height: 83vh" class="d-flex justify-content-center align-items-center">
    <span><b>You Don't Have any Transaction!</b></span>
</div>
@else
    <h3 class="text-3xl text-bold ms-5 mt-3">My Transaction</h3>
    <div class="container d-flex justify-content-center flex-column mb-5 mt-3">
        <table class="table ">
            <thead class="bg-dark text-light">
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Transaction Date</th>
                </tr>
                </thead>
            <tbody>
            <?php $i = 0;$sum=0?>
                @for ($j=count($history)-1;$j>=0;$j--)
            <tr >
                <td class="border-end">
                <a href="../details/{{ $history[$j]->id }}" class="d-flex align-items-center justify-content-evenly link-dark" style="text-decoration: none">
                    <img src="{{ url('/'.'data_file/'.$history[$j]->image) }}" class="w-20 rounded" alt="Thumbnail" width="100">
                    <p class="mb-2 md:ml-4">{{ $history[$j]->title }}</p>
                </a>
                </td>
                <td>
                    <span class="d-flex align-items-center mt-4">
                        IDR {{ $history[$j]->price }}
                    </span>
                </td>
                <td>
                    <div class="d-flex align-items-center mt-4">
                        <form action="/cart/update/{{ $header[$i]->id }}" method="post">
                            @csrf
                            <input type="number" id="quantity" name="quantity" value="{{ $header[$i]->quantity }}" max="{{ $history[$j]->stock }}" min="0" class="text-center" disabled/>
                        </form>
                    </div>
                </td>
                <td>
                    <span class="d-flex align-items-center mt-4">
                       IDR {{ $header[$i]->subtotal }}
                    </span>
                </td>
                <td>
                    <span class="d-flex align-items-center mt-4">
                    <b> {{ $header[$i]->transaction_date }}</b>
                    </span>
                </td>
            </tr>
            <?php $sum= $sum+ $header[$i]->subtotal ;$i++?>
            @endfor
            </tbody>
        </table>
        <div class="align-self-end">
            <b>IDR {{ $sum }}</b>
        </div>
        <hr>
    </div>
    @endif
    @endsection
