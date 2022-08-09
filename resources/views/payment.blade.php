@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
<!----------------- Content Wrapper ------------------->
<div id="content-wrapper" class="d-flex flex-column">
    <!-------------- Main Content -------------->
    <div id="content">

        @include('layouts.navbar')
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Payment</h1>
            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="bl5" width=""> END USER NAME</th>
                        <th class="bl5" width="">Product Details</th>
                        <th class="bl5" width="">Total Amount</th>
                        <th class="bl5" width="">Payment mode</th>
                        <th class="bl5" width="">Status</th>
                        <th class="bl5" width="">Admin Commission</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="End User Name">Amit Mishra</td>
                        <td data-label="Product Details"><a href="productdetails.html"><button type="button"
                                    class="btn btn-secondary" style="background:#5600d4">View</button></a></td>
                        <td data-label="Total Amount">50$</td>
                        <td data-label="Payment mode">Cheque</td>
                        <td data-label="Status">
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Status</option>
                                    <option value="1">Process</option>
                                    <option value="2">Received</option>
                                </select>
                            </div>
                        </td>
                        <td data-label="Admin Commission">2%</td>
                    </tr>
                    <tr>
                        <td data-label="End User Name">Amit Mishra</td>
                        <td data-label="Product Details"><a href="productdetails.html"><button type="button"
                                    class="btn btn-secondary" style="background:#5600d4">View</button></a></td>
                        <td data-label="Total Amount">50$</td>
                        <td data-label="Payment mode">Cheque</td>
                        <td data-label="Status">
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Status</option>
                                    <option value="1">Process</option>
                                    <option value="2">Received</option>
                                </select>
                            </div>
                        </td>
                        <td data-label="Admin Commission">2%</td>
                    </tr>
                    <tr>
                        <td data-label="End User Name">Amit Mishra</td>
                        <td data-label="Product Details"><a href="productdetails.html"><button type="button"
                                    class="btn btn-secondary" style="background:#5600d4">View</button></a></td>
                        <td data-label="Total Amount">50$</td>
                        <td data-label="Payment mode">Cheque</td>
                        <td data-label="Status">
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Status</option>
                                    <option value="1">Process</option>
                                    <option value="2">Received</option>
                                </select>
                            </div>
                        </td>
                        <td data-label="Admin Commission">2%</td>
                    </tr>
                    <tr>
                        <td data-label="End User Name">Amit Mishra</td>
                        <td data-label="Product Details"><a href="productdetails.html"><button type="button"
                                    class="btn btn-secondary" style="background:#5600d4">View</button></a></td>
                        <td data-label="Total Amount">50$</td>
                        <td data-label="Payment mode">Cheque</td>
                        <td data-label="Status">
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Status</option>
                                    <option value="1">Process</option>
                                    <option value="2">Received</option>
                                </select>
                            </div>
                        </td>
                        <td data-label="Admin Commission">2%</td>
                    </tr>
                    <tr>
                        <td data-label="End User Name">Amit Mishra</td>
                        <td data-label="Product Details"><a href="productdetails.html"><button type="button"
                                    class="btn btn-secondary" style="background:#5600d4">View</button></a></td>
                        <td data-label="Total Amount">50$</td>
                        <td data-label="Payment mode">Cheque</td>
                        <td data-label="Status">
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Status</option>
                                    <option value="1">Process</option>
                                    <option value="2">Received</option>
                                </select>
                            </div>
                        </td>
                        <td data-label="Admin Commission">2%</td>
                    </tr>
                </tbody>
            </table>
            <!-- Content Row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-------------- End Main Content -------------->

    @include('layouts.footer')

</div>
<!---------------------- End Content Wrapper -------------->

@endsection