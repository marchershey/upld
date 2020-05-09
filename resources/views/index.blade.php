@extends('layouts.app')

@section('content')
<section class="full-page d-flex align-items-center">
    <div class="container text-center">
        <h1 class="display-4">Upload stuff.</h1>
        <p class="lead text-muted">What are we uploading today?</p>
        <div class="row justify-content-center">

            <div class="col-6 col-md-2">
                <div class="card border-0">
                    <div class="card-body">
                        <h1 class="text-primary"><i class="far fa-file-archive"></i></h1>
                        <h5 class="lead text-muted">Files</h5>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="card border-0">
                    <div class="card-body">
                        <h1 class="text-primary"><i class="far fa-images"></i></h1>
                        <h5 class="lead text-muted">Images</h5>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="card border-0">
                    <div class="card-body">
                        <h1 class="text-primary"><i class="far fa-play-circle"></i></h1>
                        <h5 class="lead text-muted">Videos</h5>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="card border-0">
                    <div class="card-body">
                        <h1 class="text-primary"><i class="fas fa-code"></i></h1>
                        <h5 class="lead text-muted">Code</h5>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection