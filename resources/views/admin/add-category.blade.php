@extends('layout.master')
@section('title','Baktify | add Category')
@section('content')
@if ($message=Session::get('alert'))
    <script type="text/javascript">alert( '{{ $message }}')</script>
@endif

    <div class="container" style="min-height: 83vh">
        <div class="container-fluid mb-3 mt-3">
            @foreach($categories as $ctg)
                <div class="btn btn-primary me-1 ms-1 mb-1 mt-1" style="background-color:#3ab795">{{ $ctg->name }}</div>
            @endforeach
        </div>

        <h4 class="subtitle mb-3" style="color: black"><b>Add New Category</b></h4>
        <form action="{{ route('add_category') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group d-flex">
                <label for="name">Category Name:</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <hr>
            <button type="submit" class="btn btn-success">Submit</button>
            <br>
            <br>
            @error('name')
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @enderror
        </form>
        <br>
    </div>
@endsection
