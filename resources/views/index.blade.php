@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
<!----------------- Content Wrapper ------------------->
<div id="content-wrapper" class="d-flex flex-column">
    <!-------------- Main Content -------------->
    <div id="content">

        @include('layouts.navbar')

        <!------------- Begin Index Page Content ------------>
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"></h1>
            </div>

            <!-- content -->
            <div class="row">
                <div class="col-md-4">
                    <div class="da">
                        <div class="da1">Highest Rated Service Provider</div>
                        <div class="da2" style="text-align:center">30</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="da">
                        <div class="da1">Lowest Rated Service Provider</div>
                        <div class="da2" style="text-align:center">12</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="da">
                        <div class="da1">Most Rented Product</div>
                        <div class="da2" style="text-align:center">16</div>
                    </div>
                </div>
            </div>
            <!-- Content Row -->
        </div>
        <!-------------- End Index Page Content --------------->

    </div>
    <!-------------- End Main Content -------------->

    @include('layouts.footer')
pin    
</div>
<!---------------------- End Content Wrapper -------------->

@endsection