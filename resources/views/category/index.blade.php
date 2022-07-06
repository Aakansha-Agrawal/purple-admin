@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
<!----------------- Content Wrapper ------------------->
<div id="content-wrapper" class="d-flex flex-column">
    <!-------------- Main Content -------------->
    <div id="content">

        @include('layouts.navbar')

        <!------------- Begin End User Page Content ------------>
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">All Category</h1>
            </div>
            <div class="app">
                @include('flash-message')
            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="bl5">S.No</th>
                        <th class="bl5">Category</th>
                        <th class="bl5">Block</th>
                    </tr>
                </thead>
                <tbody>
                    @if($category->count() > 0)
                    @php $i=1; @endphp
                    @foreach($category as $cat)
                    <tr>
                        <td data-label="SNo">{{ $i }}</td>
                        <td data-label="Cat Name">{{ $cat->cat_name }}</td>
                            </div>
                        </td>
                        <td data-label="Block"><a href="/category/{{ $cat->id }}/delete" onclick="return confirm('Do you want to Delete the Category?');"><button type="button" class="btn btn-secondary" style="background:#5600d4">Delete</button></a></td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                    @else
                    <tr>
                        <td colspan="3"> No Category Found!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- pagination -->
        <div class="d-flex justify-content-end pr-4">
            {{ $category->links() }}
        </div>
        <!-------------- End cat Page Content --------------->


    </div>
    <!-------------- End Main Content -------------->

    @include('layouts.footer')

</div>
<!---------------------- End Content Wrapper -------------->

@endsection