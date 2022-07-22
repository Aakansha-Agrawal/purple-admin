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
            <div class="app">
                @include('flash-message')
            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="bl5" width="5%">SNo</th>
                        <th class="bl5" width="10%">End User Name</th>
                        <th class="bl5" width="20%">End User Email</th>
                        <th class="bl5" width="10%">Service Provider Name</th>
                        <th class="bl5" width="20%">Service Provider Email</th>
                        <th class="bl5" width="10%">Equipment Details</th>
                        <th class="bl5" width="10%">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if($bookings->count() > 0)
                    @php $i=1; @endphp
                    @foreach($bookings as $book)
                    <tr>
                        <td data-label="SNo">{{ $i }}</td>
                        <td data-label="End User Name">{{ $book->renter->name }}</td>
                        <td data-label="End User Email">{{ $book->renter->email }}</td>
                        <td data-label="Service Provider Name">{{ $book->service->name }}</td>
                        <td data-label="Service Provider Name">{{ $book->service->email }}</td>
                        <td data-label="Equipment Name">
                            <button type="button" style="background:#5600d4" class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal-md">View</button>
                            <!-- Button trigger modal -->

                            <!-- Modal -->
                            <div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h3 class="modal-title text-dark" id="exampleModalLongTitle"><b>Equipment Details</b></h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="row modal-body">
                                            <div class="col-md-5">
                                                <h5 class="text-dark">Equipment Name :</h5>
                                                <h5 class="text-dark">Package Taken :</h5>
                                                <h5 class="text-dark">Quantity :</h5>
                                                <h5 class="text-dark">Delivery Type :</h5>
                                                <h5 class="text-dark">Total Price :</h5>
                                                <h5 class="text-dark">Purchase Date :</h5>
                                                <h5 class="text-dark">Return Date :</h5>
                                                <h5 class="text-dark">Expiry Date :</h5>
                                            </div>
                                            <div class="col-md-6">
                                                <h5>{{ $book->equipment_name }}</h5>
                                                <h5>{{ $book->package_taken }}</h5>
                                                <h5>{{ $book->quantity }}</h5>
                                                <h5>{{ $book->delivery_type }}</h5>
                                                <h5>{{ $book->total_price }}</h5>
                                                <h5>{{ $book->purchase_date }}</h5>
                                                <h5>{{ $book->return_date }}</h5>
                                                <h5>{{ $book->expiry_date }}</h5>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td data-label="Block" class="d-flex justify-content-center">
                            <a href="/bookings/{{ $book->id }}/delete" onclick="return confirm('Do you want to Delete the Booking?');"><button type="button" class="btn btn-secondary " style="background:#5600d5">Delete</button>
                        </td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                    @else
                    <tr>
                        <td colspan="7"> No Bookings Found!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- pagination -->
        <div class="d-flex justify-content-end pr-4">
            {{ $bookings->links() }}
        </div>
        <!-------------- End Bookings Page Content --------------->

    </div>
    <!-------------- End Main Content -------------->

    @include('layouts.footer')

</div>
<!---------------------- End Content Wrapper -------------->

@endsection