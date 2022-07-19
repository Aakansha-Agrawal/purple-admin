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
                <h1 class="h3 mb-0 text-gray-800">All Products</h1>
            </div>
            <div class="app">
                @include('flash-message')
            </div>
            <table id="products" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="bl5">S.No</th>
                        <th class="bl5">Name</th>
                        <th class="bl5">Brand</th>
                        <th class="bl5">Model</th>
                        <th class="bl5">Category</th>
                        <th class="bl5">Status</th>
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
                        <td data-label="Product brand">{{ $item->brand }}</td>
                        <td data-label="Product model">{{ $item->model }}</td>
                        <td data-label="Product category">{{ $item->category->cat_name}}</td>
                        <td data-label="status">
                            <input data-id="{{$item->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Accept" data-off="Reject" {{ $item->status === 'Accept' ? 'checked'  : '' }}>
                        </td>
                        <td data-label="Delete Product" class="d-flex justify-content-center">
                            <a href="/products/{{ $item->id }}/view"><button type="button" class="btn btn-secondary" style="background:#5600d4">View</button></a>

                            <form action="" method="post">
                                @csrf
                                <button data-id=" {{ $item->id }}" type="button" class="btn btn-secondary ml-1 btn-submit" style="background:#5600d4">Delete</button>
                            </form>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(".toggle-class").on('change', function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        alert(status);
        var product_id = $(this).data('id');
        alert(product_id);
    });


    // save delete reason

    // function using in products section for delete with reason
    function myFunction() {
        let text;
        // if (confirm("Do you want to delete Product")) {

        //     let person = prompt("Reason", ".....");
        //     if (person == null || person == "") {
        //         text = '';
        //     } else {
        //         text = person;

        $(".btn-submit").click(function() {
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            console.log("hello");



        });
        //     }
        // }
    }
</script>