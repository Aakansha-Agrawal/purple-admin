@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
<!----------------- Content Wrapper ------------------->
<div id="content-wrapper" class="d-flex flex-column">
    <!-------------- Main Content -------------->
    <div id="content">

        @include('layouts.navbar')
        <!------------- Begin Bookings Page Content ------------>
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Active Bookings</h1>
            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="bl5"> Order Number</th>
                        <th class="bl5">Renter Name</th>
                        <th class="bl5">Equipment Name</th>
                        <th class="bl5">Service Provider Name</th>
                        <th class="bl5">View Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Order Number">30</td>
                        <td data-label="Renter Name">Amit</td>
                        <td data-label="Equipment Name"></td>
                        <td data-label="Service Provider Name">Abhishek</td>
                        <td data-label="View Details"><a href="viewdetails.html"><button type="button" class="btn btn-secondary" style="background:#5600d4">View Details</button></a></td>
                    </tr>
                    <tr>
                        <td data-label="Order Number">30</td>
                        <td data-label="Renter Name">Amit</td>
                        <td data-label="Equipment Name"></td>
                        <td data-label="Service Provider Name">Abhishek</td>
                        <td data-label="View Details"><a href="viewdetails.html"><button type="button" class="btn btn-secondary" style="background:#5600d4">View Details</button></a></td>
                    </tr>
                    <tr>
                        <td data-label="Order Number">30</td>
                        <td data-label="Renter Name">Amit</td>
                        <td data-label="Equipment Name"></td>
                        <td data-label="Service Provider Name">Abhishek</td>
                        <td data-label="View Details"><a href="viewdetails.html"><button type="button" class="btn btn-secondary" style="background:#5600d4">View Details</button></a></td>
                    </tr>
                    <tr>
                        <td data-label="Order Number">30</td>
                        <td data-label="Renter Name">Amit</td>
                        <td data-label="Equipment Name"></td>
                        <td data-label="Service Provider Name">Abhishek</td>
                        <td data-label="View Details"><a href="viewdetails.html"><button type="button" class="btn btn-secondary" style="background:#5600d4">View Details</button></a></td>
                    </tr>
                    <tr>
                        <td data-label="Order Number">30</td>
                        <td data-label="Renter Name">Amit</td>
                        <td data-label="Equipment Name"></td>
                        <td data-label="Service Provider Name">Abhishek</td>
                        <td data-label="View Details"><a href="viewdetails.html"><button type="button" class="btn btn-secondary" style="background:#5600d4">View Details</button></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-------------- End Bookings Page Content --------------->

    </div>
    <!-------------- End Main Content -------------->

    @include('layouts.footer')

</div>
<!---------------------- End Content Wrapper -------------->

@endsection