<div class="modal fade" id="uploadVideo" tabindex="-1" role="dialog" aria-labelledby="uploadVideoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadVideoLabel">Upload a video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/file-upload" class="dropzone dz-clickable" id="my-awesome-dropzone">
                    <div class="dz-default dz-message">
                        <button class="dz-button" type="button">
                            <h1><i class="fas fa-upload"></i></h1>
                            <strong>Choose a file</strong> or drop it here.
                        </button>
                    </div>
                </form>
                <hr class="hr-text" data-content="or paste a video url">
                <form action="" class="p-0">
                    <div class="form-group">
                        <input type="text" name="" id="" class="form-control text-center" placeholder="https://youtu.be/dQw4w9WgXcQ" aria-describedby="helpId">
                        <div class="small text-right"><a href="#">Supported sites</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
        acceptedFiles: ".webm,.mpg,.mp2,.mpeg,.mpe,.mpv,.ogg,.mp4,.m4p,.m4v,.avi,.wmv,.mov,.qt,.flv,.swf,.avchd",
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

        window.location.replace("http://upld.marc/v/" + b);
    }).on('error', function(a, b, c, d, e){
        if(b == "You can't upload files of this type."){
            Toast.fire({
                icon: 'error', 
                title: 'You can only upload video files.',
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