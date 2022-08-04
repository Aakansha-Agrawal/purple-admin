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
                <h1 class="h3 mb-0 text-gray-800">Payment To Service Provider</h1>
            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="bl5" width="">BOOKING ID</th>
                        <th class="bl5" width="">EQUIPMENT Details</th>
                        <th class="bl5" width="">BOOKING DATE</th>
                        <th class="bl5" width="">Total Amount</th>
                        <th class="bl5" width="">SERVICE PROIVDER Amount</th>
                        <th class="bl5" width="">Payment Mode</th>
                        <th class="bl5" width="">Status</th>
                        <th class="bl5" width="">Admin AMOUNT</th>
                    </tr>
                </thead>
                <tbody>
                    @if($payments->count() > 0)
                    @php $i=1; @endphp
                    @foreach($payments as $payment)
                    <tr>
                        <td data-label="Booking Id">{{ $payment->booking_id }}</td>
                        <td data-label="Equipment Details">
                            <button type="button" style="background:#5600d4" class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal-lg">View</button>
                            <!-- Button trigger modal -->

                            <!-- Modal for view details -->
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h3 class="modal-title text-dark" id="exampleModalLongTitle"><b>Equipment Details</b></h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="row modal-body">
                                            <div class="col-md-5">
                                                <h5 class="text-dark">End User Name :</h5>
                                                <h5 class="text-dark">End User Email :</h5>
                                                <h5 class="text-dark">Service Provider Name :</h5>
                                                <h5 class="text-dark">Service Provider Email :</h5>
                                                <h5 class="text-dark">Equipment Name :</h5>
                                                <h5 class="text-dark">Package Type :</h5>
                                                <h5 class="text-dark">Quantity :</h5>
                                                <h5 class="text-dark">Delivery Type :</h5>
                                                <h5 class="text-dark">Purchase Date :</h5>
                                                <h5 class="text-dark">Expiry Date :</h5>
                                            </div>
                                            <div class="col-md-6">
                                                @if( $payment->renter_id === $payment->renter->id)
                                                <h5>{{ $payment->renter->name }}</h5>
                                                <h5>{{ $payment->renter->email }}</h5>
                                                @endif

                                                @if( $payment->service_provider_id === $payment->service_provider->id)
                                                <h5>{{ $payment->service_provider->name }}</h5>
                                                <h5>{{ $payment->service_provider->email }}</h5>
                                                @endif
                                                
                                                <h5>{{ $payment->product->name }}</h5>
                                                <h5>{{ $payment->booking->package }}</h5>
                                                <h5>{{ $payment->booking->quantity }}</h5>
                                                <h5>{{ $payment->booking->delivery_type }}</h5>
                                                <h5>{{ $payment->booking->purchase_date }}</h5>
                                                <h5>{{ $payment->booking->expiry_date }}</h5>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td data-label="Booking Date">{{ $payment->booking->purchase_date }}</td>
                        <td data-label="Total Amount">{{ $payment->total_amount }}$</td>
                        <td data-label="Service Provider Amount">{{ $payment->service_provider_amount }}$</td>
                        <td data-label="Payment mode">{{ $payment->payment_mode }}</td>
                        <td data-label="Status">{{ $payment->service_provider_status }}</td>
                        <td data-label="Admin Commission">{{ $payment->admin_amount }}$</td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                    @else
                    <tr>
                        <td colspan="3"> No Records Found!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- pagination -->
        <div class="d-flex justify-content-end pr-4">
            {{ $payments->links() }}
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-------------- End Main Content -------------->

    @include('layouts.footer')

</div>
<!---------------------- End Content Wrapper -------------->

@endsection