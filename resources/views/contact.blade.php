@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
<!----------------- Content Wrapper ------------------->
<div id="content-wrapper" class="d-flex flex-column">
    <!-------------- Main Content -------------->
    <div id="content">

        @include('layouts.navbar')
        <!------------- Begin Contact Page Content ------------>
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Contact</h1>
            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="bl5"> Name</th>
                        <th class="bl5">Email</th>
                        <th class="bl5">Message</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Name">Amit</td>
                        <td data-label="Email">amitmshr04@gmail.com</td>
                        <td data-label="Message">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                    </tr>
                    <tr>
                        <td data-label="Name">Amit</td>
                        <td data-label="Email">amitmshr04@gmail.com</td>
                        <td data-label="Message">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                    </tr>
                    <tr>
                        <td data-label="Name">Amit</td>
                        <td data-label="Email">amitmshr04@gmail.com</td>
                        <td data-label="Message">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                    </tr>
                    <tr>
                        <td data-label="Name">Amit</td>
                        <td data-label="Email">amitmshr04@gmail.com</td>
                        <td data-label="Message">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                    </tr>
                    <tr>
                        <td data-label="Name">Amit</td>
                        <td data-label="Email">amitmshr04@gmail.com</td>
                        <td data-label="Message">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-------------- End Contact Page Content --------------->

    </div>
    <!-------------- End Main Content -------------->

    @include('layouts.footer')

</div>
<!---------------------- End Content Wrapper -------------->

@endsection