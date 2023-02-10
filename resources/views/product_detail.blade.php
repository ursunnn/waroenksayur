@extends('layout.master')
@section('title', $product->title.' | Waroenk Sayur')
@section('content')

<div class="py-3 mb-4 shadow-sm border-top">
    <div class="container">
        <h6 class="mb-0"> Product / {{ $product->Category->name}} / {{ $product->title}}</h6>
    </div>

</div>

<div class="container mt-5 mb-5" style="min-height: 70vh">
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{ url('/'.'data_file/'.$product->image) }}" alt="product image" width="300px" style="margin-left: 15%">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        <b>{{ $product->title }}</b>
                        <label style="font-size: 16px;" class="float-end badge bg-success trending_tag"> Mutu Terjamin</label>
                    </h2>
                    <hr>
                    <p class="mb-2 mt-3">Category: {{ $product->Category->name}}</p>
                    <hr>
                    <label class="fw-bold">Price : {{$product->price}}</label>
                    <p class="mb-2 mt-3">{{ $product->description }}</p>
                    <hr>
                    <div class="row mt-2">
                        <br/>
                        @if ($product->stock >0)
                        <a class="btn btn-primary rounded-5 float-start">In Stock : {{$product->stock}}</a>
                        @else
                            <button class="btn btn-danger rounded-5 float-start">Sold Out</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
