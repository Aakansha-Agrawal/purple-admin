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
            <div class="app">
                @include('flash-message')
            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="bl5" width="10%">S No.</th>
                        <th class="bl5">Name</th>
                        <th class="bl5">Email</th>
                        <th class="bl5">Role</th>
                        <th class="bl5">Phone</th>
                        <th class="bl5">Message</th>
                        <th class="bl5" width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($contact->count() > 0)
                    @php $i=1; @endphp
                    @foreach($contact as $data)
                    <tr>
                        <td data-label="SNo">{{ $i }}</td>
                        <td data-label="Name">{{ $data->user->name }}</td>
                        <td data-label="Email">{{ $data->user->email }}</td>
                        <td data-label="Email">
                            @if($data->user->role == 'service')
                            Service Provider
                            @else
                            End User
                            @endif
                        </td>
                        <td data-label="Phone">{{ $data->user->phone }}</td>
                        <td data-label="Message">{{ $data->message }}</td>
                        <td data-label="Block"><a href="/contact/{{$data->id}}/delete" onclick="return confirm('Do you want to Delete the Contact?');"><button type="button" class="btn btn-secondary" style="background:#5600d4">Delete</button></a></td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                    @else
                    <tr>
                        <td colspan="7"> No Contacts Found!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- pagination -->
        <div class="d-flex justify-content-end pr-4">
            {{ $contact->links() }}
        </div>
        <!-------------- End Contact Page Content --------------->

    </div>
    <!-------------- End Main Content -------------->

    @include('layouts.footer')

</div>
<!---------------------- End Content Wrapper -------------->

@endsection