@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
<!----------------- Content Wrapper ------------------->
<div id="content-wrapper" class="d-flex flex-column">
    <!-------------- Main Content -------------->
    <div id="content">

        @include('layouts.navbar')
        <!------------- Begin Bookings Page Content ------------>
        <div class="mx-2">

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
                        <th class="bl5" width="10%">Renter Name</th>
                        <th class="bl5" width="20%">Renter Email</th>
                        <th class="bl5" width="10%">Service Provider Name</th>
                        <th class="bl5" width="20%">Service Provider Email</th>
                        <th class="bl5" width="10%">Equipment Name</th>
                        <th class="bl5" width="10%">Purchase Date</th>
                        <!-- <th class="bl5">Expiry Date</th> -->
                        <th class="bl5" width="10%">Block</th>
                    </tr>
                </thead>
                <tbody>
                    @if($bookings->count() > 0)
                    @php $i=1; @endphp
                    @foreach($bookings as $book)
                    <tr>
                        <td data-label="SNo">{{ $i }}</td>
                        <td data-label="Renter Name">{{ $book->renter->full_name }}</td>
                        <td data-label="Renter Email">{{ $book->renter->email }}</td>
                        <td data-label="Service Provider Name">{{ $book->service->full_name }}</td>
                        <td data-label="Service Provider Name">{{ $book->service->email }}</td>
                        <td data-label="Equipment Name">{{ $book->equipment_name }}</td>
                        <td data-label="Purchase Date">{{ $book->purchase_date }}</td>
                        <!-- <td data-label="Expiry Date">{{ $book->expiry_date }}</td> -->
                        <td data-label="Block" class="d-flex justify-content-center">
                            <a href="/bookings/{{ $book->id }}/view"><button type="button" class="btn btn-secondary" style="background:#5600d4">View</button></a>
                            <a href="/bookings/{{ $book->id }}/delete" onclick="return confirm('Do you want to Delete the Booking?');"><button type="button" class="btn btn-secondary " style="background:#5600d4">Delete</button>
                        </td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                    @else
                    <tr>
                        <td colspan="9"> No Bookings Found!</td>
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