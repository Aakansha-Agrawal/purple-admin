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
                <h1 class="h3 mb-0 text-gray-800">Bookings</h1>
            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="bl5"> All Bookings</th>
                        <th class="bl5">Active Bookings</th>
                        <th class="bl5">Closed Bookings</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="All Bookings">30</td>
                        <td data-label="Active Bookings">15</td>
                        <td data-label="Closed Bookings">15</td>
                    </tr>
                    <tr>
                        <td data-label="All Bookings">30</td>
                        <td data-label="Active Bookings">15</td>
                        <td data-label="Closed Bookings">15</td>
                    </tr>
                    <tr>
                        <td data-label="All Bookings">30</td>
                        <td data-label="Active Bookings">15</td>
                        <td data-label="Closed Bookings">15</td>
                    </tr>
                    <tr>
                        <td data-label="All Bookings">30</td>
                        <td data-label="Active Bookings">15</td>
                        <td data-label="Closed Bookings">15</td>
                    </tr>
                    <tr>
                        <td data-label="All Bookings">30</td>
                        <td data-label="Active Bookings">15</td>
                        <td data-label="Closed Bookings">15</td>
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