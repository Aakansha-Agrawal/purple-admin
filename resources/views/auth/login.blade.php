@extends('layouts.app')
<link href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">

@section('content')

<body style="background:#F7F7F7">
    <div class="container-fluid bl" style="padding-bottom:90px;">
        <div class="row ">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="bl1" style="background:#fff;">
                    <div class="bl3"> Admin Login</div>
                    <div class="bl4">Login to your Account</div>

                    <div class="app">
                        @include('flash-message')
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" id="exampleInputEmail1" class="form-control bxyz form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" id="exampleInputPassword1" class="form-control bxyz form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <button type="submit" class="btn btn-secondary bl2" style=" padding:5px 140px; font-size:26px;  margin-top:25px;">LOGIN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection