@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
<!----------------- Content Wrapper ------------------->
<div id="content-wrapper" class="d-flex flex-column">
    <!-------------- Main Content -------------->
    <div id="content">

        @include('layouts.navbar')

        <!------------- Begin End User Page Content ------------>
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Deleted End User</h1>
            </div>
            <div class="app">
                @include('flash-message')
            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="bl5">SNo</th>
                        <th class="bl5">Name</th>
                        <th class="bl5">Email</th>
                        <th class="bl5">Phone</th>
                        <th class="bl5">Profile Picture</th>
                        <!-- <th class="bl5">Payment Status</th> -->
                        <th class="bl5">Block</th>
                    </tr>
                </thead>
                <tbody>
                    @if($renters->count() > 0)
                    @php $i=1; @endphp
                    @foreach($renters as $renter)
                    <tr>
                        <td data-label="SNo">{{ $i }}</td>
                        <td data-label="Full Name">{{ $renter->full_name }}</td>
                        <td data-label="Email">{{ $renter->email }}</td>
                        <td data-label="Phone">{{ $renter->phone }}</td>
                        <td data-label="Profile Picture"><img src="/{{ $renter->profile_pic }}" alt="image" width="70px" height="60px" class="img-circle"></td>
                        <!-- <td data-label="Status">
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option {{ $renter->payment_status == 'Pending' ? 'selected':'' }}>Pending</option>
                                    <option {{ $renter->payment_status == 'Processed' ? 'selected':'' }}>Processed</option>
                                    <option {{ $renter->payment_status == 'Received' ? 'selected':'' }}>Received</option>
                                </select>
                            </div>
                        </td> -->
                        <td data-label="Block" class="d-flex justify-content-center">
                            <a href="/end-user/{{ $renter->id }}/restore" onclick="return confirm('Do you want to Restore the user?');"><button type="button" class="btn btn-secondary" style="background:#5600d4">Restore</button></a>
                            <a href="/end-user/{{ $renter->id }}/delete" onclick="return confirm('Do you want to Delete the End User?');"><button type="button" class="btn btn-secondary" style="background:#5600d4">Delete</button></a>
                        </td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6"> No End Users Found!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- pagination -->
        <div class="d-flex justify-content-end pr-4">
            {{ $renters->links() }}
        </div>
        <!-------------- End Renter Page Content --------------->


    </div>
    <!-------------- End Main Content -------------->

    @include('layouts.footer')

</div>
<!---------------------- End Content Wrapper -------------->

@endsection