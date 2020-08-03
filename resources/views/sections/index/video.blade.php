@extends('layouts.app')

@section('hidenav', 'a')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <video id="my_video_1" class="video-js vjs-default-skin" width="640px" height="267px"
                controls preload="none" poster='http://video-js.zencoder.com/oceans-clip.jpg'
                data-setup='{ "aspectRatio":"640:267", "playbackRates": [1, 1.5, 2] }'>
                <source src="/link/dfjb" type='video/mp4' />
                <source src="/link/dfjb" type='video/webm' />
            </video>
            <div class="row">
                <div class="col">
                    <div class="card rounded-0">
                        <div class="card-body rounded-0">
                            <div class="row">
                                <div class="col-12 h5 font-weight-bold">
                                    This is going to be a long title to test out how long a title can be. This is going to be a long title to test out how long a title can be. This is going to be a long title to test out how long a titl
                                </div>
                            </div>
                            <div class="row text-muted small">
                                <div class="col-6">
                                    12,094 views
                                </div>
                                <div class="col-6 text-right">
                                    <a href="#">Report</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('modals')
@include('layouts.modals.newvideo')
@endpush