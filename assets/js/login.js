$(document).ready(function(){
	if ($(window).width() < 993) {
		$('#box').removeClass('push-m9');
		$('#box').addClass('push-m7');
	} else {
		$('#box').removeClass('push-m7');
		$('#box').addClass('push-m9');
	}
	$(window).resize(function(){
		if ($(window).width() < 993) {
			$('#box').removeClass('push-m9');
			$('#box').addClass('push-m7');
		} else {
			$('#box').removeClass('push-m7');
			$('#box').addClass('push-m9');
		}
	});
})