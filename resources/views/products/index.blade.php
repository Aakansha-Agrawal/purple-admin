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
                <h1 class="h3 mb-0 text-gray-800">All Products</h1>
            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="bl5"> Product Name</th>
                        <th class="bl5">Service Provider Name</th>
                        <th class="bl5">Service Provider Email</th>
                        <th class="bl5"> Product Details</th>
                        <th class="bl5">Delete Product</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Product Name">Product Name</td>
                        <td data-label="Service Provider Name">Amit</td>
                        <td data-label="Service Provider Email">amitmshr04@gmail.com</td>
                        <td data-label="Product Details"><a href="/products/1"><button type="button"
                                    class="btn btn-secondary" style="background:#5600d4">View</button></a></td>
                        <td data-label="Delete Product"><a href="url_to_delete"
                                onclick="return confirm('Do you want to Delete the user?');"><button type="button"
                                    class="btn btn-secondary" style="background:#5600d4">Delete</button></a></td>
                    </tr>
                    <tr>
                        <td data-label="Product Name">Product Name</td>
                        <td data-label="Service Provider Name">Amit</td>
                        <td data-label="Service Provider Email">amitmshr04@gmail.com</td>
                        <td data-label="Product Details"><a href="/products/1"><button type="button"
                                    class="btn btn-secondary" style="background:#5600d4">View</button></a></td>
                        <td data-label="Delete Product"><a href="url_to_delete"
                                onclick="return confirm('Do you want to Delete the user?');"><button type="button"
                                    class="btn btn-secondary" style="background:#5600d4">Delete</button></a></td>
                    </tr>
                    <tr>
                        <td data-label="Product Name">Product Name</td>
                        <td data-label="Service Provider Name">Amit</td>
                        <td data-label="Service Provider Email">amitmshr04@gmail.com</td>
                        <td data-label="Product Details"><a href="/products/1"><button type="button"
                                    class="btn btn-secondary" style="background:#5600d4">View</button></a></td>
                        <td data-label="Delete Product"><a href="url_to_delete"
                                onclick="return confirm('Do you want to Delete the user?');"><button type="button"
                                    class="btn btn-secondary" style="background:#5600d4">Delete</button></a></td>
                    </tr>
                    <tr>
                        <td data-label="Product Name">Product Name</td>
                        <td data-label="Service Provider Name">Amit</td>
                        <td data-label="Service Provider Email">amitmshr04@gmail.com</td>
                        <td data-label="Product Details"><a href="/products/1"><button type="button"
                                    class="btn btn-secondary" style="background:#5600d4">View</button></a></td>
                        <td data-label="Delete Product"><a href="url_to_delete"
                                onclick="return confirm('Do you want to Delete the user?');"><button type="button"
                                    class="btn btn-secondary" style="background:#5600d4">Delete</button></a></td>
                    </tr>
                    <tr>
                        <td data-label="Product Name">Product Name</td>
                        <td data-label="Service Provider Name">Amit</td>
                        <td data-label="Service Provider Email">amitmshr04@gmail.com</td>
                        <td data-label="Product Details"><a href="/products/1"><button type="button"
                                    class="btn btn-secondary" style="background:#5600d4">View</button></a></td>
                        <td data-label="Delete Product"><a href="url_to_delete"
                                onclick="return confirm('Do you want to Delete the user?');"><button type="button"
                                    class="btn btn-secondary" style="background:#5600d4">Delete</button></a></td>
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