@extends('layouts.app')

@section('content')
<div class="index-page">

    <section class="upload-div d-flex flex-column justify-content-center align-items-center">
        <div class="col-lg-6 text-center">
            <h1 class="display-4">Upload stuff.</h1>
            <p class="lead text-muted">What are we uploading today?</p>
            <div class="row">
                <div class="col-12 col-md-6 mx-auto">
                    <nav class="nav nav-pills nav-justified mt-2 mb-5">
                        <a class="nav-item nav-link" data-toggle="tab" href="#file" role="tab" aria-controls="file" aria-selected="false">File</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="false">Image</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="false">Video</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#text" role="tab" aria-controls="text" aria-selected="false">Code</a>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 mx-auto">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="null" role="tabpanel" aria-labelledby="null-tab"></div>
                        <div class="tab-pane fade" id="file" role="tabpanel" aria-labelledby="files-tab">
                            <div class="custom-file text-left">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Select a file...</label>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="videos-tab">
                            videos
                        </div>
                        <div class="tab-pane fade" id="text" role="tabpanel" aria-labelledby="text-tab">
                            text
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="scroll-div text-center">
        <p class="small mb-3">scroll down</p>
        <h2 class="mt-auto"><i class="fas fa-chevron-down animated bounce"></i></h2>
    </section>

    <div class="container-md mb-5">
        <hr>
    </div>

    <section class="stats">
        <div class="row">

        </div>
    </section>

</div>
@endsection