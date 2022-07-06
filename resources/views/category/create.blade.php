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

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Add Category</h1>
            </div>
            <form method="post" action="/category/store">
                @csrf
                <div class="row">
                    <div class="col-md-2 text-right"><h5>Category</h5></div>
                    <div class="col-md-10">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="cat_name" id="cat_name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10"><button type="submit" class="btn btn-success av">Submit</button></div>
                </div>
            </form>
            <!-- Content Row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

    @include('layouts.footer')

</div>
<!-- End of Content Wrapper -->

@endsection