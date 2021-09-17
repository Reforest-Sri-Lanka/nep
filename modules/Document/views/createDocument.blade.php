@extends('documents')

@section('general')

<div class="container">
    <div class="d-flex mb-2 justify-content-start">
        <h1>Add new document</h1>
    </div>

    <!-- FAQ button -->
    <div class="d-flex mb-2 justify-content-end">
        <span><a title="FAQ" style="font-size:24px;cursor:pointer;" data-toggle="modal" data-target="#restorationHelp"><i class="fa fa-info-circle" aria-hidden="true"></i></a></span>
    </div>
    @include('faq')
    
    <document-create></document-create>

</div>
           
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.3/xlsx.full.min.js"></script> -->
<script type="text/javascript">

    $(document).ready(function() {

        ///UPLOADING A FILE AND RETRIEVING AND CREATING A LAYER FROM IT.
        document.getElementById("upload").addEventListener("click", function() {
        event.preventDefault();
        var formData = new FormData();
        formData.append("file_upload",  document.getElementById('select_file'));

        $.ajax({
            url: "{{ route('ajaxmap.documentupload') }}",
            method: "POST",
            data: formData,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token2"]').attr('content')
                },
            processData: false,
            success: function(data) {
                $('#message').css('display', 'block');
                $('#message').html(data.message);
                $('#message').addClass(data.class_name);
                $('#uploaded_image').html(data.uploaded_image);
                var tmp = data.uploaded_image;
            }
        })

    });

    });
</script>

@endsection