@extends('layouts.app')

@section('hidenav', 'a')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <video id="video" class="video-js vjs-default-skin vjs-fluid" data-setup='{"controls": true, "autoplay": false, "preload": "auto"}'>
                <source src="/link/{{$media->mid}}" type='video/mp4' />
            <source src="/link/{{$media->mid}}" type='video/webm' />
            </video> --}}

            <video id="video" class="video-js vjs-default-skin vjs-fluid" data-setup='{"controls": true, "autoplay": false, "preload": "auto", "poster": "{{config('app.url') . "/direct/" . $media->thumbnail}}"}'>
                <source src="/direct/{{$media->mid}}" type='video/mp4' />
                <source src="/direct/{{$media->mid}}" type='video/webm' />
            </video>

            <div class="row">
                <div class="col">
                    <div class="card rounded-0">
                        <div class="card-body rounded-0">
                            <div class="row">
                                <div class="col-12 h5 font-weight-bold">
                                    {{$media->title}}
                                </div>
                            </div>
                            <div class="row text-muted small">
                                <div class="col-6">
                                    {{$media->views}} views
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{$media->source_link}}" target="_blank">Source</a> | <a href="#">Report</a>
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

@push('scripts')
@endpush