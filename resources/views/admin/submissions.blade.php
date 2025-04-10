@extends('layouts.admin')

@section('content')
<!-- Blueimp Gallery CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-gallery/2.42.0/css/blueimp-gallery.min.css">

<!-- File Upload CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/10.32.0/css/jquery.fileupload.css">

<!-- Image Upload Form -->
<form id="fileupload" action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input id="fileupload-input" type="file" name="files[]" multiple style="display: none;">
    <button type="button" id="upload-btn" class="btn btn-primary">Upload Images</button>

    <!-- Progress Bar -->
    <div id="progress" class="progress mt-2" style="display: none;">
        <div class="progress-bar progress-bar-striped bg-success" style="width: 0%;"></div>
    </div>

    <!-- Blueimp Gallery -->
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>

    <!-- Uploaded Images Preview -->
    <div id="links"></div>
</form>



<!-- Blueimp Gallery JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-gallery/2.42.0/js/blueimp-gallery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/10.32.0/js/jquery.fileupload.min.js"></script>

<script>
$(function () {
    $('#upload-btn').click(function () {
        $('#fileupload-input').click(); // Open file input
    });

    $('#fileupload-input').fileupload({
        url: "{{ route('file.upload') }}",
        type: "POST",
        dataType: 'json',
        formData: {_token: '{{ csrf_token() }}'},
        start: function () {
            $('#progress').show();
            $('.progress-bar').css('width', '0%').text('0%');
        },
        progressall: function (e, data) {
            var progress = parseInt((data.loaded / data.total) * 100, 10);
            $('.progress-bar').css('width', progress + '%').text(progress + '%');
        },
        done: function (e, data) {
            $('.progress-bar').css('width', '100%').text('Upload Complete!');
            $.each(data.result.files, function (index, file) {
                var imageUrl = "/storage/" + file.path;
                $("#links").append(
                    '<a href="' + imageUrl + '" title="' + file.name + '" data-gallery>' +
                    '<img src="' + imageUrl + '" width="100" height="100" style="margin: 5px; border-radius: 5px;">' +
                    '</a>'
                );
            });
        },
        fail: function () {
            alert('File upload failed.');
        }
    });

    // Activate Blueimp Gallery
    document.getElementById('links').onclick = function (event) {
        event = event || window.event;
        var target = event.target || event.srcElement;
        var link = target.parentElement;
        if (link.tagName === 'A' && link.dataset.gallery) {
            blueimp.Gallery(document.getElementById('links').getElementsByTagName('a'));
            event.preventDefault();
        }
    };
});
</script>




@endsection