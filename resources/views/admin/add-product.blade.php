@extends('layout.master')
@section('title','Baktify | add Music')
@section('content')
@error('image')
    <script type="text/javascript">alert( '{{ $message }}')</script>
@enderror
    <div class="container">
        <h3 class="subtitle" style="color: black"><b>New Content</b></h3>
        <form action="{{ route('add_music') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" class="form-control" name="image">
            </div>
            <hr>
            <div class="form-group">
                <label for="title">Product Name:</label>
                <input type="text" name="title" class="form-control" id="title">
            </div>
            @error('title')
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @enderror
            <hr>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea  name="description" class="form-control" rows="5" id="description"></textarea>
            </div>
            @error('description')
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @enderror
            <hr>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" min="1000" step="1000" name="price" class="form-control" id="price" placeholder="0">
            </div>
            @error('price')
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @enderror
            <hr>
            <div class="form-group">
                <label for="stock">Product Quantity:</label>
                <input type="number" min="1" step="1"  name="stock" class="form-control" id="stock" placeholder="0">
            </div>
            @error('stock')
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @enderror
            <hr>
            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category" id="category" class="form-control">
                    @foreach($categories as $ctg)
                    <option value="{{ $ctg->id }}" name="category">{{ $ctg->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="d-flex justify-content-end">
                <a class="btn btn-danger me-right me-3" href="{{ route('music_list') }}">Cancel</a>
                <button type="submit" class="btn btn-success">Insert</button>
            </div>
        </form>
        <br>
    </div>
@endsection
