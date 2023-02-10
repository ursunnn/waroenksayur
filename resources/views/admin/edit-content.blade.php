@extends('layout.master')
@section('title','Baktify | Edit Music')
@section('content')
@error('image')
    <script type="text/javascript">alert( '{{ $message }}')</script>
@enderror
    <div class="container d-flex flex-column">
        <h3 class="subtitle" style="color: black"><b>{{ $product->title }}</b></h3>
        <img src="{{ url('/'.'data_file/'.$product->image)}}" alt="" width="250px"  style="align-self: center;">
        <form action="/admin/edit/{{$product->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" class="form-control" name="image">
            </div>
            <hr>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea  name="description" class="form-control" rows="5" id="description" placeholder="{{ $product->description }}"></textarea>
            </div>
            @error('description')
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @enderror
            <hr>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" min="1000" step="1000" name="price" class="form-control" id="price" placeholder="{{ $product->price }}" value="">
            </div>
            @error('price')
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @enderror
            <hr>
            <div class="form-group">
                <label for="stock">Product Quantity:</label>
                <input type="number" min="1" step="1"  name="stock" class="form-control" id="stock" placeholder="{{ $product->stock }}" value="">
            </div>
            @error('stock')
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @enderror
            <hr>
            <br>
            <div class="d-flex justify-content-end">
                <a class="btn btn-danger me-right me-3" href="{{ route('music_list') }}">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        <br>
    </div>
@endsection
