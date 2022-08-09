@extends('layouts.app')

@section('content')

@include('layouts.sidebar')

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        @include('layouts.navbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Banner List</h1>
                <a href="{{ route('app_banner.create') }}"><button class="btn btn-success">Upload Banner</button></a>
            </div>
            <div class="app">
                @include('flash-message')
            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="bl5">S.No</th>
                        <th class="bl5">Title</th>
                        <th class="bl5">Image</th>
                        <th class="bl5">Block</th>
                    </tr>
                </thead>
                <tbody>
                    @if($banner->count() > 0)
                    @php $i=1; @endphp
                    @foreach($banner as $ban)
                    <tr>
                        <td data-label="SNo">{{ $i }}</td>
                        <td data-label="ban Name">{{ $ban->title }}</td>
                        <td data-label="ban image"><img src="/{{ $ban->banner }}" alt="image" width="70px" height="60px" class="img-circle"></td>
                        <td data-label="Block"><a href="{{ route('app_banner.edit', $ban->id)}}"><button type="button" class="btn btn-secondary" style="background:#5600d4">Edit</button></a></td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                    @else
                    <tr>
                        <td colspan="4"> No banner Found!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- pagination -->
        <div class="d-flex justify-content-end pr-4">
            {{ $banner->links() }}
        </div>
    </div>
    <!-- End of Main Content -->

    @include('layouts.footer')

</div>
<!-- End of Content Wrapper -->

@endsection