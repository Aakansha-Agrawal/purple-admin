@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
<!----------------- Content Wrapper ------------------->
<div id="content-wrapper" class="d-flex flex-column">
    <!-------------- Main Content -------------->
    <div id="content">

        @include('layouts.navbar')

        <!------------- Begin Renter Page Content ------------>
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Renter</h1>
            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="bl5"> Full Name</th>
                        <th class="bl5">Email</th>
                        <th class="bl5">Phone</th>
                        <th class="bl5"> Profile Picture</th>
                        <th class="bl5">Block</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Full Name">Amit Mishra</td>
                        <td data-label="Email">amitmshr04@gmail.com</td>
                        <td data-label="Phone">9999999999</td>
                        <td data-label="Profile Picture"></td>
                        <td data-label="Block"><a href="url_to_delete" onclick="return confirm('Do you want to Delete the user?');"><button type="button" class="btn btn-secondary" style="background:#5600d4">Delete</button></a></td>
                    </tr>
                    <tr>
                        <td data-label="Full Name">Amit Mishra</td>
                        <td data-label="Email">amitmshr04@gmail.com</td>
                        <td data-label="Phone">9999999999</td>
                        <td data-label="Profile Picture"></td>
                        <td data-label="Block"><a href="url_to_delete" onclick="return confirm('Do you want to Delete the user?');"><button type="button" class="btn btn-secondary" style="background:#5600d4">Delete</button></a></td>
                    </tr>
                    <tr>
                        <td data-label="Full Name">Amit Mishra</td>
                        <td data-label="Email">amitmshr04@gmail.com</td>
                        <td data-label="Phone">9999999999</td>
                        <td data-label="Profile Picture"></td>
                        <td data-label="Block"><a href="url_to_delete" onclick="return confirm('Do you want to Delete the user?');"><button type="button" class="btn btn-secondary" style="background:#5600d4">Delete</button></a></td>
                    </tr>
                    <tr>
                        <td data-label="Full Name">Amit Mishra</td>
                        <td data-label="Email">amitmshr04@gmail.com</td>
                        <td data-label="Phone">9999999999</td>
                        <td data-label="Profile Picture"></td>
                        <td data-label="Block"><a href="url_to_delete" onclick="return confirm('Do you want to Delete the user?');"><button type="button" class="btn btn-secondary" style="background:#5600d4">Delete</button></a></td>
                    </tr>
                    <tr>
                        <td data-label="Full Name">Amit Mishra</td>
                        <td data-label="Email">amitmshr04@gmail.com</td>
                        <td data-label="Phone">9999999999</td>
                        <td data-label="Profile Picture"></td>
                        <td data-label="Block"><a href="url_to_delete" onclick="return confirm('Do you want to Delete the user?');"><button type="button" class="btn btn-secondary" style="background:#5600d4">Delete</button></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-------------- End Renter Page Content --------------->


    </div>
    <!-------------- End Main Content -------------->

    @include('layouts.footer')

</div>
<!---------------------- End Content Wrapper -------------->

@endsection