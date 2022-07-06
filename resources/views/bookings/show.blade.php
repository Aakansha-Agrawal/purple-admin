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
                        <th class="bl5">Price Type</th>
                        <th class="bl5">Total Price</th>
                        <th class="bl5">Expiry Date</th>
                        <th class="bl5">End User Payment Status</th>
                        <th class="bl5">Service Provider Price</th>
                        <th class="bl5">Service Provider Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Price Type">{{ $booking->price_type }}</td>
                        <td data-label="TOtal Price">{{ $booking->total_price }}</td>
                        <td data-label="Expiry Date">{{ $booking->expiry_date }}</td>
                        <td data-label="End User Payment Status">
                        <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option {{ $booking->renter_payment_status == 'Pending' ? 'selected':'' }}>Pending</option>
                                    <option {{ $booking->renter_payment_status == 'Processed' ? 'selected':'' }}>Processed</option>
                                    <option {{ $booking->renter_payment_status == 'Received' ? 'selected':'' }}>Received</option>
                                </select>
                            </div>
                        </td>
                        <td data-label="SP Price">{{ $booking->service->price }}</td>
                        <td data-label="Status">
                        <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option {{ $booking->service->payment_status == 'Pending' ? 'selected':'' }}>Pending</option>
                                    <option {{ $booking->service->payment_status == 'Processed' ? 'selected':'' }}>Processed</option>
                                    <option {{ $booking->service->payment_status == 'Received' ? 'selected':'' }}>Received</option>
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