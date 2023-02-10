@extends('layout.master')
@section('title', 'Baktify | Update Profile')
@section('content')
<div class="background pb-5 pt-5">
    <div class="container" style="width:700px">
        <div class="mb-3  m-2">
            <h3 class="h3">Update Your Profile</h3>
        </div>
        <div class="card" style="background: lightblue; padding: 1rem">
            <form action="{{route('update')}}" method="post">
              @csrf
              <div class="card-body">
                  <div class="mb-2 d-flex flex-column align-items-start">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name ="name" class="form-control" id="name" placeholder="{{ $user->name }}" value="{{old('name')}}">
                  </div>
                  @error('name')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror

                  <div class="mb-2 d-flex flex-column align-items-start">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name ="email" class="form-control" id="email" placeholder="{{ $user->email }}" value="{{old('email')}}">
                  </div>
                  @error('email')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror

                  <div class="d-flex justify-content-between">
                      <div class="mb-2 d-flex flex-column align-items-start">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" name ="password"class="form-control" id="password" placeholder="8 - 20 Characters">
                        </div>
                        <div class="mb-2 d-flex flex-column align-items-start">
                            <label for="confirm" class="form-label">Confirm Password</label>
                            <input type="password" name="confirm" class="form-control" id="confirm" placeholder="Re-type your password">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                          @error('password')
                          <div class="text-danger">
                              <p>{{ $message }}</p>
                          </div>
                          @enderror
                          @error('confirm')
                          <div class="text-danger">
                              <p>{{ $message }}</p>
                          </div>
                          @enderror
                      </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea  name="address" class="form-control" rows="5" id="address" placeholder="{{ $user->address }}"></textarea>
                    </div>
                    @error('address')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror

                  <div class="mb-2 d-flex flex-column align-items-start">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" name ="phone" class="form-control" id="phone" placeholder="{{ $user->phone }}">
                  </div>
                  @error('phone')
                    <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                  <br>
                  <div class="d-flex justify-content-end">
                    <a class="btn btn-danger me-right me-3" href="{{ route('profile') }}">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
                <hr>
              </div>
        </div>
    </div>
</div>
@endsection
