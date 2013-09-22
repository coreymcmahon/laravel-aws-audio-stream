@extends('base')

@section('content')
    <div id="player"></div>
@stop

@section('footer-scripts')
@parent

<!-- http://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/TutorialStreamingJWPlayer.html -->
jwplayer('player').setup({
    file: 'rtmp://s2y5j7oj67q2fe.cloudfront.net/cfx/st/{{ $stream->name }}',
    height: '30'
});

@stop

@section('head-assets')
{{ HTML::script('jwplayer/jwplayer.js') }}
@show