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
            <form method="POST" class="form-horizontal" action="{{ route('app_banner.store') }}" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="card-body d-flex justify-content-between">
                    <div class="form-group">
                        <label for="name" class="text-end control-label">
                            First Banner</label>
                        <div class="">
                            <input type="file" class="form-control" name="banners[]" id="banner1" required>
                        </div>

                        <div class="my-2 img-preview1"> </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="text-end control-label">
                            Second Banner</label>
                        <div class="">
                            <input type="file" class="form-control" name="banners[]" id="banner2" required>
                        </div>

                        <div class="my-2 img-preview2"> </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="text-end control-label">
                            Third Banner</label>
                        <div class="">
                            <input type="file" class="form-control" name="banners[]" id="banner3" required>
                        </div>

                        <div class="my-2 img-preview3"> </div>
                    </div>

                </div>
                <div class="ml-4">
                    <input type="submit" class="btn btn-primary" value="Submit" />
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
    $('input[type="file"][id="banner1"]').val('');
    $('input[type="file"][id="banner2"]').val('');
    $('input[type="file"][id="banner3"]').val('');

    // for banner 1
    $('input[type="file"][id="banner1"]').on('change', function() {
        var img_path = $(this)[0].value;
        var img_holder = $('.img-preview1');
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

    // for banner 2
    $('input[type="file"][id="banner2"]').on('change', function() {
        var img_path = $(this)[0].value;
        var img_holder = $('.img-preview2');
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

    // for banner 3
    $('input[type="file"][id="banner3"]').on('change', function() {
        var img_path = $(this)[0].value;
        var img_holder = $('.img-preview3');
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