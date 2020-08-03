@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row d-flex justify-content-center mt-5">
        <div class="col-5 text-center">
            <div class="logo">
                <img src="https://i.imgur.com/NHDtoSQ.png" alt="logo" height="100px">
            </div>
            <div class="display-3">vimg.io</div>
            <div class="h2 text-muted mb-5">media hosting made easy</div>
            <form action="/file-upload" class="dropzone dz-clickable" id="my-awesome-dropzone">
                <div class="dz-default dz-message">
                    <button class="dz-button" type="button">
                        <h1><i class="fas fa-upload"></i></h1>
                        <strong>Choose a file</strong> or drop it here.
                    </button>
                </div>
            </form>
            <hr class="hr-text gray" data-content="or paste a video url">
            <form action="" class="p-0">
                <div class="form-group">
                    <input type="text" name="" id="" class="form-control text-center" placeholder="https://youtu.be/dQw4w9WgXcQ" aria-describedby="helpId">
                    <div class="small text-right"><a href="#">Supported sites</a></div>
                </div>
            </form>



        </div>
    </div>



</div>
@endsection

@push('scripts')
<script>
    $('input[type="file"]').change(function (e) {
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });

    var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone(".dropzone",{ 
        maxFilesize: 1000,  // 3 mb
        acceptedFiles: ".jpeg,.jpg,.png,.apng,.gif,.tiff,.tif,.mp4,.mpeg,.avi,.webm,.mov,.qt",
    });
    myDropzone.on("sending", function(file, xhr, formData) {
       formData.append("_token", CSRF_TOKEN);
    }).on('success', function(e, b, c, d){
        console.log(e)
        console.log(b)
        console.log(c)
        console.log(d)
        $('#uploadVideo').modal('hide');
        this.removeAllFiles(true); 
        Toast.fire({
            icon: 'success', 
            title: 'Your video was uploaded!',
            timer: 2000,
            showProgressBar: true,
        })

        window.location.replace("http://v.vimg.marc/" + b);
    }).on('error', function(a, b, c, d, e){
        if(b == "You can't upload files of this type."){
            Toast.fire({
                icon: 'error', 
                title: 'That format is not supported yet.',
                timer: 4000,
                showProgressBar: true,
            })
        }else if(typeof(b.message) != "undefined" && b.message !== null) {
            Toast.fire({
                icon: 'error', 
                title: b.message,
                timer: 4000,
                showProgressBar: true,
            })
        }else{
            Toast.fire({
                icon: 'error', 
                title: b,
                timer: 4000,
                showProgressBar: true,
            })
        }

        
        console.log('---')
        console.log(a)
        console.log(b)
        console.log(c)
        console.log(d)
        this.removeAllFiles(true); 
    }); 
</script>
@endpush