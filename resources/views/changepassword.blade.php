@extends('layouts.app')

@section('content')

@include('layouts.sidebar')

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        @include('layouts.navbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Change Password</h1>
            </div>
            <div class="app">
                @include('flash-message')
            </div>
            <form method="POST" class="form-horizontal" action="/update-password/{{Auth::user()->id}}">
                @csrf
                @method('post')
                <div class="card-body">
                    <!-- <h4 class="card-title">Edit Category Info</h4> -->
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 text-end control-label col-form-label">
                            Current Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="curpwd" name="current_password" placeholder="Current Password here....">
                            @error('current_password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 text-end control-label col-form-label">
                            New Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="newpwd" name="new_password" value="" placeholder="New Password here....">
                            @error('new_password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 text-end control-label col-form-label">
                            Confirm Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="conpwd" name="confirm_password" value="" placeholder="Confirm Password.....">
                            @error('confirm_password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    @include('layouts.footer')

</div>
<!-- End of Content Wrapper -->

@endsection