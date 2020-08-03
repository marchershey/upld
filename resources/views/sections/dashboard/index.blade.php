@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="card">
                    <div class="card-body p-2">
                        <form action="/fileupload" method="post">
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#uploadVideo"><i class="fas fa-cloud-upload-alt fa-fw mr-1"></i> Upload a New Video</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col text-center">
                    <h4>It's so empty in here.</h4>
                    <p class="small text-muted">Upload some videos to spice things up.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('modals')
@include('layouts.modals.newvideo')
@endpush