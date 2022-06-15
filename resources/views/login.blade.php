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
                    <form>
                        <div class="form-group">

                            <input type="email" class="form-control bxyz" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">

                            <input type="password" class="form-control bxyz" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                        </div>
                        <button type="submit" class="btn btn-secondary bl2" style=" padding:5px 110px; font-size:26px;  margin-top:25px;">LOGIN</button>
                    </form>
                </div>
            </div>

            <div class="col-md-4"></div>
        </div>
    </div>
</body>

@endsection