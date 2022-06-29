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
                <h1 class="h3 mb-0 text-gray-800">Deleted Products</h1>
            </div>
            <div class="app">
                @include('flash-message')
            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="bl5">S No</th>
                        <th class="bl5">Name</th>
                        <th class="bl5">Service Provider Name</th>
                        <th class="bl5">Service Provider Email</th>
                        <th class="bl5">Rent Cost</th>
                        <th class="bl5">Stocks</th>
                        <th class="bl5">Block</th>
                    </tr>
                </thead>
                <tbody>
                    @if($products->count() > 0)
                    @php $i=1; @endphp
                    @foreach($products as $item)
                    <tr>
                        <td data-label="S No">{{ $i }}</td>
                        <td data-label="Product Name">{{ $item->name }}</td>
                        <td data-label="Service Provider Name">{{ $item->service->full_name }}</td>
                        <td data-label="Service Provider Email">{{ $item->service->email }}</td>
                        <td data-label="Rent Cost">{{ $item->rent_cost }}</td>
                        <td data-label="Stocks">{{ $item->stocks }}</td>
                        <td data-label="Block" class="d-flex justify-content-center">
                            <a href="/products/{{ $item->id }}/restore" onclick="return confirm('Do you want to Restore the user?');"><button type="button" class="btn btn-secondary" style="background:#5600d4">Restore</button></a>
                            <a href="url_to_delete" onclick="return confirm('Do you want to Delete the user?');"><button type="button" class="btn btn-secondary ml-2" style="background:#5600d4">Delete</button></a>
                        </td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                    @else
                    <tr>
                        <td colspan="7"> No Reviews Found!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- pagination -->
        <div class="d-flex justify-content-end pr-4">
            {{ $products->links() }}
        </div>
        <!-------------- End Product Page Content --------------->

    </div>
    <!-------------- End Main Content -------------->

    @include('layouts.footer')

</div>
<!---------------------- End Content Wrapper -------------->

@endsection