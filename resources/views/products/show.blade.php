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
                <h1 class="h3 mb-0 text-gray-800">Product Details</h1>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <!-- <img src="{{ asset('assets/img/placeholder.png') }}" class="mySlides" alt="product" width="100%" height="400px" /> -->

                    @if($product->product_images)
                    <div class="w3-content w3-display-container">

                        @foreach($product->product_images as $image)
                        <img src="/{{ $image->url }}" class="mySlides" alt="product" width="100%" height="400px" />
                        @endforeach

                        <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                        <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                    </div>
                    @endif
                </div>
                <div class="col-md-5">
                    <div class="mb-3">
                        <h2 class="text-dark">{{ $product->name }}</h2>
                        <h4>Model - {{ $product->model }}</h4>
                        <h4>Brand - {{ $product->brand }}</h4>

                        <div class="d-flex mt-3">
                            <div class="mr-4">
                                <h5>Per Day Price - {{ $product->per_day_price }}</h5>
                                <h5>Per Hour Price - {{ $product->per_hour_price }}</h5>
                                <h5>Two Day Price - {{ $product->two_day_price }}</h5>
                            </div>
                            <div class="ml-4">
                                <h5>Weekly Price - {{ $product->weekly_price }}</h5>
                                <h5>Weekend Price - {{ $product->weekend_price }}</h5>
                                <h5>Shipping Cost - {{ $product->shipping_cost }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h5 class="text-dark"><b>Description -</b></h5>
                        <p>{{ $product->description }}</p>
                    </div>
                    <div>
                        <a href="{{ url('') }}/{{$product->manual_pdf}}" target="_blank">
                            <b>
                                <h5><i class="fa fa-download mr-1" aria-hidden="true"></i>Download</h5>
                            </b>
                        </a>
                        <div class="mt-3">
                            Package 1 - {{ $product->package_1 }}
                        </div>
                        <div>
                            Package 2 - {{ $product->package_2 }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <h4 class="text-dark"><b>Terms & Conditions</b></h4>
                <p>{{ $product->terms_conditions }}</p>
            </div>
        </div>
        <!-------------- End Product Page Content --------------->
    </div>
    <!-------------- End Main Content -------------->

    @include('layouts.footer')

</div>
<!---------------------- End Content Wrapper -------------->
@endsection