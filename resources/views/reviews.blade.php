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
                        <th class="bl5" width="15%"> RENTER NAME</th>
                        <th class="bl5" width="20%">RENTER email</th>
                        <th class="bl5" width="15%">SERVICE PROVIDER NAME</th>
                        <th class="bl5" width="20%"> SERVICE PROVIDER email</th>
                        <th class="bl5" width="10%">RATINGS</th>
                        <th class="bl5" width="20%">REVIEW</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Renter Name">Amit Mishra</td>
                        <td data-label="Renter Email">amitmshr04@gmail.com</td>
                        <td data-label="Service Provider Name">Abhishek</td>
                        <td data-label="Service Provider Email">abhishek123@gmail.com</td>
                        <td data-label="Ratings">5</td>
                        <td data-label="Review">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                    </tr>
                    <tr>
                        <td data-label="Renter Name">Amit Mishra</td>
                        <td data-label="Renter Email">amitmshr04@gmail.com</td>
                        <td data-label="Service Provider Name">Abhishek</td>
                        <td data-label="Service Provider Email">abhishek123@gmail.com</td>
                        <td data-label="Ratings">5</td>
                        <td data-label="Review">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                    </tr>
                    <tr>
                        <td data-label="Renter Name">Amit Mishra</td>
                        <td data-label="Renter Email">amitmshr04@gmail.com</td>
                        <td data-label="Service Provider Name">Abhishek</td>
                        <td data-label="Service Provider Email">abhishek123@gmail.com</td>
                        <td data-label="Ratings">5</td>
                        <td data-label="Review">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                    </tr>
                    <tr>
                        <td data-label="Renter Name">Amit Mishra</td>
                        <td data-label="Renter Email">amitmshr04@gmail.com</td>
                        <td data-label="Service Provider Name">Abhishek</td>
                        <td data-label="Service Provider Email">abhishek123@gmail.com</td>
                        <td data-label="Ratings">5</td>
                        <td data-label="Review">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                    </tr>
                    <tr>
                        <td data-label="Renter Name">Amit Mishra</td>
                        <td data-label="Renter Email">amitmshr04@gmail.com</td>
                        <td data-label="Service Provider Name">Abhishek</td>
                        <td data-label="Service Provider Email">abhishek123@gmail.com</td>
                        <td data-label="Ratings">5</td>
                        <td data-label="Review">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-------------- End Reviews Page Content --------------->

    </div>
    <!-------------- End Main Content -------------->

    @include('layouts.footer')

</div>
<!---------------------- End Content Wrapper -------------->

@endsection