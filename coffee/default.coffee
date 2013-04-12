$ = jQuery

$('a[rel="external"]').attr 'target', '_blank'

$(".fancybox").fancybox({
	maxWidth	: 800,
	maxHeight	: 600,
	fitToView	: false,
	autoSize	: false,
	padding 	: 0,
	closeClick	: false,
	openEffect	: 'fade',
	closeEffect	: 'fade'
})

$('.mailing-message').css('height', 'auto').fancybox(
	autoWidth	: true,
	autoHeight	: true,
	# modal		: true,
	fitToView	: false,
	autoSize	: true,
	padding 	: 0
).click()