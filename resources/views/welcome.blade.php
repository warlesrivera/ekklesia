@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{asset('assets/css/styles-build.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/css/maximage.css')}}" rel="stylesheet">

@endsection

@section('content')
    @include('components.build')
@endsection

@section('script')
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js'></script>
		<script src="{{asset('assets/js/build/jquery.easing.min.js')}}" type="text/javascript" charset="utf-8"></script>
		<script src="{{asset('assets/js/build/jquery.cycle.all.js')}}" type="text/javascript" charset="utf-8"></script>
		<script src="{{asset('assets/js/build/jquery.maximage.js')}}" type="text/javascript" charset="utf-8"></script>
		<script src="{{asset('assets/js/build/jquery.fullscreen.js')}}" type="text/javascript" charset="utf-8"></script>
		<script src="{{asset('assets/js/build/jquery.ba-hashchange.js')}}" type="text/javascript" charset="utf-8"></script>
		<script src="{{asset('assets/js/build/main.js')}}" type="text/javascript" charset="utf-8"></script>

		<script type="text/javascript" charset="utf-8">
			$(function(){
				$('#maximage').maximage({
					cycleOptions: {
						fx: 'fade',
						speed: 1000, // Has to match the speed for CSS transitions in jQuery.maximage.css (lines 30 - 33)
						timeout: 5000,
						prev: '#arrow_left',
						next: '#arrow_right',
						pause: 0,
						before: function(last,current){
							if(!$.browser.msie){
								// Start HTML5 video when you arrive
								if($(current).find('video').length > 0) $(current).find('video')[0].play();
							}
						},
						after: function(last,current){
							if(!$.browser.msie){
								// Pauses HTML5 video when you leave it
								if($(last).find('video').length > 0) $(last).find('video')[0].pause();
							}
						}
					},
					onFirstImageLoaded: function(){
						jQuery('#cycle-loader').hide();
						jQuery('#maximage').fadeIn('fast');
					}
				});

				// Helper function to Fill and Center the HTML5 Video
				jQuery('video,object').maximage('maxcover');

			});
		</script>
@endsection


