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


            {{-- <i class="fas fa-volume-up"></i> --}}
            <div class="row">
                <div class="col">
                    <video id="player" class="video-js vjs-fluid" data-setup='{"controls": false, "muted": false, "autoplay": true, "loop": true, "preload": "auto", "poster": "{{config('app.url') . "/direct/" . $media->thumbnail}}"}'>
                        <source src="/direct/{{$media->mid}}" type='{{$media->mime}}' />
                    </video>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body pt-0">
                            <div class="row mb-1">
                                <div class="col">
                                    <div id="indicator" class="w-100">
                                        <i id="indicator-arrow" class="fas fa-caret-down"></i>
                                    </div>
                                    <div id="slider-range"></div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center text-center">
                                <div class="col-3">
                                    start time
                                    <input type="text" id="start" class="form-control text-center" value="0:00">
                                </div>
                                <div class="col-3">
                                    end time
                                    <input type="text" id="end" class="form-control text-center">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    <a href="#" id="sound" class="btn btn-light btn-sm text-muted"><i class="fas fa-volume-up fa-fw"></i></a>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="#" class="btn btn-primary btn-sm">Complete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
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
<script>
    var player = videojs('player')

    var miliseconds = '{{$media->duration}}';
    console.log(miliseconds);
    var seconds = miliseconds / 1000;
    var duration = moment.duration(seconds, 'seconds').format('mm:ss');

    $('#player').click(function () {
        if (player.paused()) {
            player.play();
        } else {
            player.pause();
        }
    });
    
    $('#sound').on('click', function (){
        if(player.muted()){
            $(this).removeClass('btn-danger').addClass('btn-light text-muted').html('<i class="fas fa-volume-up fa-fw"></i>')
            player.muted(false)
        }else{
            $(this).removeClass('btn-light text-muted').addClass('btn-danger').html('<i class="fas fa-volume-mute fa-fw"></i>')
            player.muted(true)
        }
        $(this).blur();
    })

    $('#indicator').on('click', function(e){
        var bcr = this.getBoundingClientRect();
        var percentage = ((e.clientX - bcr.left) / bcr.width) * 100;
        var time = (((percentage / 100) * miliseconds) / 1000)
        player.currentTime(time)
    })

    $('#slider-range').on('mousedown', function() {
        player.pause();
    }).on('mouseup', function() {
        player.play();
    });

    setInterval(function(){
        if(player.currentTime() > ($("#slider-range").slider("values", 1) / 1000)){
            player.currentTime($("#slider-range").slider("values", 0) / 1000)
        }
       
        $('#indicator-arrow').css('margin-left', ((player.currentTime() * 1000) / miliseconds * 100) + '%')
    }, 1);

    $("#slider-range").slider({
        range: true,
        min: 0,
        max: miliseconds,
        step: 1,
        values: [0, miliseconds],
        slide: function (event, ui) {
            // console.log(ui)
            // update text input fields
            $('#start').val(moment.duration(ui.values[0]).format('mm:ss.SS', {trim: false}))
            $('#end').val(moment.duration(ui.values[1]).format('mm:ss.SS', {trim: false}))
            
            if(ui.handleIndex == 0){
                player.currentTime(ui.value / 1000)
                $('#slider-range').on('mouseup', function(){
                    player.currentTime(ui.values[0] / 1000)
                    // console.log(player.currentTime())
                })
            }else{
                player.currentTime(ui.value / 1000)
                $('#slider-range').on('mouseup', function(){
                    player.currentTime(ui.values[0] / 1000)
                    // console.log(player.currentTime())
                })
                // console.log(player.currentTime())
            }

            $('.ui-slider-handle').blur()
        }
    });
    $('#end').val(moment.duration($("#slider-range").slider("values", 1)).format('mm:ss.SS', {trim: false}))

</script>
@endpush