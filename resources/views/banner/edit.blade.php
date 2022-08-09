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
                <h1 class="h3 mb-0 text-gray-800">Upload App Banner</h1>
            </div>
            <div class="app">
                @include('flash-message')
            </div>
            <form method="POST" class="form-horizontal" action="{{ route('app_banner.update',$banner->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body justify-content-between">
                    <div class="form-group">
                        <label for="name" class="text-end control-label">
                            Edit Banner</label>
                        <div class="">
                            <input type="file" class="form-control" name="banner" required>
                        </div>
                    </div>
                    <div class="mb-2 img-preview">
                    </div>
                </div>
                <div class="ml-4">
                    <input type="submit" class="btn btn-primary" value="Update" />
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    @include('layouts.footer')

</div>
<!-- End of Content Wrapper -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
    $('input[type="file"][name="banner"]').val('');
    $('input[type="file"][name="banner"]').on('change', function() {
        var img_path = $(this)[0].value;
        var img_holder = $('.img-preview');
        var extension = img_path.substring(img_path.lastIndexOf('.') + 1).toLowerCase();

        if (typeof(FileReader) != "undefined") {
            img_holder.empty();
            var reader = new FileReader();
            reader.onload = function(e) {
                $('<img/>', {
                    'src': e.target.result,
                    'class': 'img-fluid',
                    'style': 'width:250px;height:200px'
                }).appendTo(img_holder);
            }
            img_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        }
    });
</script>

@endsection