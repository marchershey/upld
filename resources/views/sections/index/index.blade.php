@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row d-flex justify-content-center mt-md-5">
        <div class="col-12 col-md-4 text-center">
            <div class="logo">
                <img src="https://i.imgur.com/NHDtoSQ.png" alt="logo" height="100px">
            </div>
            <div class="display-3">vimg.io</div>
            <div class="h2 text-muted mb-5">video hosting made easy</div>

            <div class="card">
                <div class="card-body">

                    @include('layouts.messages')

                    <form id="link-upload" action="/upload/link" method="POST">
                        @csrf
                        <input type="text" class="form-control text-center" id="link-text" placeholder="Paste a video link">
                        <input type="hidden" id="link" name="link">
                    </form>

                    <hr class="hr-text" data-content="or upload your own">

                    <div class="file btn btn-lg btn-block btn-primary">
                        Select a video file
                        <input type="file" name="file" id="testfile" />
                    </div>

                    <div class="progressbar-block" style="display: none">
                        <div class="progressbar mt-2"></div>
                        <div class="h1 text-muted mt-3"><i class="fas fa-compact-disc fa-spin"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection

@push('scripts')
<script>
    $("#link-text").bind("paste", function(e){
        // link was pasted
        var link = e.originalEvent.clipboardData.getData('text');
        $('#link').val(link)
        $('#link-upload').submit()
    }).keypress(function (e) {
        // enter key was pressed
        if (e.which == 13) {
            alert('test')
            return false;    //<---- Add this line
        };
    });
    //     const uppy = new Uppy({ debug: false, autoProceed: true })

//     const fileInput = document.querySelector('#testfile')

//     fileInput.addEventListener('change', (event) => {
//         $('.progressbar-block').slideDown();

//         const files = Array.from(event.target.files)
//         files.forEach((file) => {
//             try {
//                 uppy.addFile({
//                     source: 'file input',
//                     name: file.name,
//                     type: file.type,
//                     data: file
//                 })
//             } catch (err) {
//                 if (err.isRestriction) {
//                     // handle restrictions
//                     console.log('Restriction error:', err)
//                 } else {
//                     // handle other errors
//                     console.error(err)
//                 }
//             }
//         })
//     })

//     uppy.use(ProgressBar, {
//         target: '.progressbar',
//         hideAfterFinish: false
//     })
    
// uppy.use(XHRUpload, {
//   endpoint: '/upload',
//   formData: true,
//   fieldName: 'file',
//   headers: {
//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// })

//     uppy.on('upload-success', (file, response) => {
//         window.location.replace("/v/" + response.body.mid);
//         // const url = response.uploadURL
//         // const fileName = file.name

//         // const li = document.createElement('li')
//         // const a = document.createElement('a')
//         // a.href = url
//         // a.target = '_blank'
//         // a.appendChild(document.createTextNode(fileName))
//         // li.appendChild(a)

//         // document.querySelector('.uploaded-files ol').appendChild(li)
//     })


    // const uppyOne = new Uppy({ debug: true, autoProceed: true })
    // uppyOne
    //     .use(DragDrop, { target: '.dropzone', note: 'Videos up to 1GB - Sign up for unlimited', locale: {strings: { dropHereOr: 'Drop a video here or %{browse}.', browse: 'select one'}} })
    //     .use(ProgressBar, { target: '.progressbar', hideAfterFinish: true })
    //     .use(XHRUpload, { endpoint: '/upload', formData: true, fieldName: 'media', headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} })
    //     .on('upload-success', (file, response) => {
    //         console.log('---')
    //         console.log(file)
    //         console.log(response)
    //         console.log('---')

    //         const mid = response.body.mid
    //         const fileName = file.name

    //         const li = document.createElement('li')
    //         const a = document.createElement('a')
    //         a.href = 'http://m.vimg.marc/' + mid 
    //         a.target = '_blank'
    //         a.appendChild(document.createTextNode(fileName))
    //         li.appendChild(a)

    //         document.querySelector('.uploaded-files ul').appendChild(li)
    //     })

</script>



{{-- <script>
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

        this.removeAllFiles(true); 
    }); 
</script> --}}
@endpush