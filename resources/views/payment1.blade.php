@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
<!----------------- Content Wrapper ------------------->
<div id="content-wrapper" class="d-flex flex-column">
    <!-------------- Main Content -------------->
    <div id="content">

        @include('layouts.navbar')

        <!------------- Begin Payment1 Page Content ------------>
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Payment to Service Provider</h1>
            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="bl5" width="14%" style="font-size:12px!important">Service Provider Name</th>
                        <th class="bl5" width="8%" style="font-size:12px!important">Service Provider bank details</th>
                        <th class="bl5" width="20%" style="font-size:12px!important">Service provider email</th>
                        <th class="bl5" width="14%" style="font-size:12px!important">End User Name</th>
                        <th class="bl5" width="8%" style="font-size:12px!important">Product Details</th>
                        <th class="bl5" width="8%" style="font-size:12px!important">Total Amount (End User)</th>
                        <th class="bl5" width="8%" style="font-size:12px!important">Total Amount (Service Provider)</th>
                        <th class="bl5" width="8%" style="font-size:12px!important">Payment Status</th>
                        <th class="bl5" width="12%" style="font-size:12px!important">Admin Commission</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Service Provider Name">Amit Mishra</td>
                        <td data-label="Service Provider Bank Details">ICICI Bank</td>
                        <td data-label="Service Provider Email">amitmshr04@gmail.com</td>
                        <td data-label="End User Name">Abhishek</td>
                        <td data-label="Product Details"><a href="productdetails1.html"><button type="button" class="btn btn-secondary" style="background:#5600d4">View</button></a></td>
                        <td data-label="Total Amount(End User)">50$</td>
                        <td data-label="Total Amount(Service Provider)">80$</td>
                        <td data-label="Payment Status">
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
                        <td data-label="Service Provider Name">Amit Mishra</td>
                        <td data-label="Service Provider Bank Details">ICICI Bank</td>
                        <td data-label="Service Provider Email">amitmshr04@gmail.com</td>
                        <td data-label="End User Name">Abhishek</td>
                        <td data-label="Product Details"><a href="productdetails1.html"><button type="button" class="btn btn-secondary" style="background:#5600d4">View</button></a></td>
                        <td data-label="Total Amount(End User)">50$</td>
                        <td data-label="Total Amount(Service Provider)">80$</td>
                        <td data-label="Payment Status">
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
                        <td data-label="Service Provider Name">Amit Mishra</td>
                        <td data-label="Service Provider Bank Details">ICICI Bank</td>
                        <td data-label="Service Provider Email">amitmshr04@gmail.com</td>
                        <td data-label="End User Name">Abhishek</td>
                        <td data-label="Product Details"><a href="productdetails1.html"><button type="button" class="btn btn-secondary" style="background:#5600d4">View</button></a></td>
                        <td data-label="Total Amount(End User)">50$</td>
                        <td data-label="Total Amount(Service Provider)">80$</td>
                        <td data-label="Payment Status">
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
                        <td data-label="Service Provider Name">Amit Mishra</td>
                        <td data-label="Service Provider Bank Details">ICICI Bank</td>
                        <td data-label="Service Provider Email">amitmshr04@gmail.com</td>
                        <td data-label="End User Name">Abhishek</td>
                        <td data-label="Product Details"><a href="productdetails1.html"><button type="button" class="btn btn-secondary" style="background:#5600d4">View</button></a></td>
                        <td data-label="Total Amount(End User)">50$</td>
                        <td data-label="Total Amount(Service Provider)">80$</td>
                        <td data-label="Payment Status">
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
        </div>
        <!-------------- End Payment1 Page Content --------------->
    </div>
    <!-------------- End Main Content -------------->

    @include('layouts.footer')

</div>
<!---------------------- End Content Wrapper -------------->

@endsection