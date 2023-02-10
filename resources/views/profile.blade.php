@extends('layout.master')
@section('title', 'Profile | Waroenk Sayur')
@section('content')
@if ($message=Session::get('alert'))
    <script type="text/javascript">alert( '{{ $message }}')</script>
@endif

<div class="background pb-5 pt-5">
    <div class="container" style="width:700px">
        <div class="mb-3  m-2">
            <h3 class="h3">Your Profile</h3>
        </div>
        <div class="card" style="background: lightblue; padding: 1rem">
              <div class="card-body">
                  <div class="mb-2 d-flex flex-column align-items-start">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name ="name" class="form-control" id="name" value="{{{$user->name}}}" disabled>
                  </div>

                  <div class="mb-2 d-flex flex-column align-items-start">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name ="email" class="form-control" id="email" value='{{$user->email}}' disabled>
                  </div>

                  <div class="d-flex justify-content-between">
                      <div class="mb-2 d-flex flex-column align-items-start">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" name ="password"class="form-control" id="password" value= "password" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea  name="address" class="form-control" rows="5" id="address" disabled>{{ $user->address }}</textarea>
                    </div>
                  <div class="mb-2 d-flex flex-column align-items-start">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" name ="phone" class="form-control" id="phone" value="{{ $user->phone }}" disabled>
                  </div>
                  <hr>
                  <br>
                  <div class="d-flex justify-content-end">
                    <a class="btn btn-primary me-3" href="{{ route('index_update') }}">Update</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">sign out</button>
                    </form>
                  </div>
                </form>
              </div>
        </div>
    </div>
</div>
@endsection
