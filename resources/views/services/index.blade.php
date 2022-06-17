@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
<!----------------- Content Wrapper ------------------->
<div id="content-wrapper" class="d-flex flex-column">
    <!-------------- Main Content -------------->
    <div id="content">

        @include('layouts.navbar')

        <!------------- Begin Services Page Content ------------>
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Registered Service Providers</h1>
            </div>
            <div class="app">
                @include('flash-message')
            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="bl5">S No.</th>
                        <th class="bl5">Name</th>
                        <th class="bl5">Email</th>
                        <th class="bl5">Phone</th>
                        <th class="bl5">Profile Picture</th>
                        <th class="bl5">Block</th>
                    </tr>
                </thead>
                <tbody>
                    @if($services->count() > 0)
                    @php $i=1; @endphp
                    @foreach($services as $service)
                    <tr>
                        <td data-label="Sno">{{ $i }}</td>
                        <td data-label="Full Name">{{ $service->full_name }}</td>
                        <td data-label="Email">{{ $service->email }}</td>
                        <td data-label="Phone">{{ $service->phone }}</td>
                        <td data-label="Profile Picture"><img src="/{{ $service->profile_pic }}" alt="image" width="70px" height="60px" class="img-circle"></td>
                        <td data-label="Block"><a href="/services/{{ $service->id }}/delete" onclick="return confirm('Do you want to Delete the user?');"><button type="button" class="btn btn-secondary" style="background:#5600d4">Delete</button></a></td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5"> No Services Found!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <!-------------- End Services Page Content --------------->

    </div>
    <!-------------- End Main Content -------------->

    @include('layouts.footer')

</div>
<!---------------------- End Content Wrapper -------------->

@endsection