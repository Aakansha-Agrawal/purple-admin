@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
<!----------------- Content Wrapper ------------------->
<div id="content-wrapper" class="d-flex flex-column">
    <!-------------- Main Content -------------->
    <div id="content">

        @include('layouts.navbar')
        <!------------- Begin Reviews Page Content ------------>
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Reviews</h1>
            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="bl5">S.No</th>
                        <th class="bl5">END USER NAME</th>
                        <th class="bl5">END USER EMAIL</th>
                        <th class="bl5">SERVICE PROVIDER NAME</th>
                        <th class="bl5"> SERVICE PROVIDER EMAIL</th>
                        <th class="bl5">PRODUCT NAME</th>
                        <th class="bl5"> PRODUCT EMAIL</th>
                        <th class="bl5">END USER RATINGS</th>
                        <th class="bl5">END USER REVIEWS</th>
                    </tr>
                </thead>
                <tbody>
                    @if($reviews->count() > 0)
                    @php $i=1; @endphp
                    @foreach($reviews as $item)
                    <tr>
                        <td data-label="End User Name">{{ $i }}</td>
                        <td data-label="End User Name">{{ $item->renter->name }}</td>
                        <td data-label="End User Email">{{ $item->renter->email }}</td>
                        <td data-label="Service Provider Name">{{ $item->service->full_name }}</td>
                        <td data-label="Service Provider Email">{{ $item->service->email }}</td>
                        <td data-label="Product Name">{{ $item->product_id }}</td>
                        <td data-label="Product Email">{{ $item->product_id }}</td>
                        <td data-label="Ratings">{{ $item->rating }}</td>
                        <td data-label="Review">{{ $item->review }}</td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                    @else
                    <tr>
                        <td colspan="9"> No Reviews Found!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- pagination -->
        <div class="d-flex justify-content-end pr-4">
            {{ $reviews->links() }}
        </div>
        <!-------------- End Reviews Page Content --------------->

    </div>
    <!-------------- End Main Content -------------->

    @include('layouts.footer')

</div>
<!---------------------- End Content Wrapper -------------->

@endsection