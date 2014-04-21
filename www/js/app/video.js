
$(function() {
	$('video').mediaelementplayer({
		pluginPath: '/player/',
		features: ['playpause', 'progress', 'current', 'duration', 'tracks', 'volume', 'fullscreen'],
		iPadUseNativeControls: true,
		iPhoneUseNativeControls: true,
		AndroidUseNativeControls: true,
		enableKeyboard: true,
		success: function(mediaElement, originalNode) {

		}
	});
});
