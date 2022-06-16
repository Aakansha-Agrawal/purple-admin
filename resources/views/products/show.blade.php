@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
<!----------------- Content Wrapper ------------------->
<div id="content-wrapper" class="d-flex flex-column">
    <!-------------- Main Content -------------->
    <div id="content">

        @include('layouts.navbar')
        <!------------- Begin Product Page Content ------------>

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Product Details</h1>
            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="bl5"> Product Name</th>
                        <th class="bl5">Product Images</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Product Name">Product Name</td>
                        <td data-label="Product Images"></td>
                    </tr>
                    <tr>
                        <td data-label="Product Name">Product Name</td>
                        <td data-label="Product Images"></td>
                    </tr>
                    <tr>
                        <td data-label="Product Name">Product Name</td>
                        <td data-label="Product Images"></td>
                    </tr>
                    <tr>
                        <td data-label="Product Name">Product Name</td>
                        <td data-label="Product Images"></td>
                    </tr>
                    <tr>
                        <td data-label="Product Name">Product Name</td>
                        <td data-label="Product Images"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-------------- End Product Page Content --------------->
    </div>
    <!-------------- End Main Content -------------->

    @include('layouts.footer')

</div>
<!---------------------- End Content Wrapper -------------->
@endsection