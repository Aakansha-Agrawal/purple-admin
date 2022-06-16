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
                <h1 class="h3 mb-0 text-gray-800">View Details</h1>
            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="bl5"> Model</th>
                        <th class="bl5">Brand</th>
                        <th class="bl5">Package Selected</th>
                        <th class="bl5">Price</th>
                        <th class="bl5">Delivery & Pickup</th>
                        <th class="bl5">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Model">A1</td>
                        <td data-label="Brand"></td>
                        <td data-label="Package Selected"></td>
                        <td data-label="Price">$30</td>
                        <td data-label="Delivery & Pickup"></td>
                        <td data-label="Status">
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected="">Status</option>
                                    <option value="1">Process</option>
                                    <option value="2">Received</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Model">A1</td>
                        <td data-label="Brand"></td>
                        <td data-label="Package Selected"></td>
                        <td data-label="Price">$30</td>
                        <td data-label="Delivery & Pickup"></td>
                        <td data-label="Status">
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected="">Status</option>
                                    <option value="1">Process</option>
                                    <option value="2">Received</option>

                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Model">A1</td>
                        <td data-label="Brand"></td>
                        <td data-label="Package Selected"></td>
                        <td data-label="Price">$30</td>
                        <td data-label="Delivery & Pickup"></td>
                        <td data-label="Status">
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected="">Status</option>
                                    <option value="1">Process</option>
                                    <option value="2">Received</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Model">A1</td>
                        <td data-label="Brand"></td>
                        <td data-label="Package Selected"></td>
                        <td data-label="Price">$30</td>
                        <td data-label="Delivery & Pickup"></td>
                        <td data-label="Status">
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected="">Status</option>
                                    <option value="1">Process</option>
                                    <option value="2">Received</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Model">A1</td>
                        <td data-label="Brand"></td>
                        <td data-label="Package Selected"></td>
                        <td data-label="Price">$30</td>
                        <td data-label="Delivery & Pickup"></td>
                        <td data-label="Status">
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected="">Status</option>
                                    <option value="1">Process</option>
                                    <option value="2">Received</option>
                                </select>
                            </div>
                        </td>
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