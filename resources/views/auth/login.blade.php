@extends('layout.master')
@section('title', 'Baktify | Login Page')
@section('content')
@if ($message=Session::get('alert'))
    <script type="text/javascript">alert( '{{ $message }}')</script>
@endif
<div class="background p-5" style="height: 86vh">
    <div class="container" style="width:700px">
        <div class="mb-3  m-2 align-text-center">
            <h3 class="h3 text-dark">Sign in To Your Account</h3>
          </div>
        <div class="card" style="background: lightblue">
            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="mb-2 d-flex flex-column align-items-start">
                        <label for="email" class="form-label ">Email address</label>
                        <input type="email" name ="email" class="form-control" id="email" placeholder="name@example.com" value="{{old('email')}}">
                      </div>
                      <div class="mb-2 d-flex flex-column align-items-start">
                        <label for="password" class="form-label ">Password</label>
                        <input type="password" name ="password" class="form-control" id="password" placeholder="8 - 20 Characters">
                      </div>
                      <div class="mb-2 form-check d-flex justify-content-start gap-2">
                        <input class="form-check-input" type="checkbox" name="remember" value="" id="remember">
                        <label class="form-check-label" for="remember">
                          Remember Me
                        </label>
                      </div>
                      <div class="mb-2">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        </div>
                        @endif
                      </div>
                      <div class="mb-2">
                        <button type="submit" class="btn btn-light w-100">Login</button>
                      </div>
                    </form>
                    <hr>
                    <p>Don't Have an Account Yet ? Click <a href="/register" class="link-dark"><u>Here</u></a> to Register.</p>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
