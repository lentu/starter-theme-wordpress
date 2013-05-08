$ = jQuery

Main =
	init : ->
		Main.forms()
		Main.trackEventMailing()
		$('a[rel="external"]').attr 'target', '_blank'
		$(".various").fancybox({
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			autoSize	: false,
			padding 	: 0,
			closeClick	: false,
			openEffect	: 'fade',
			closeEffect	: 'fade'
		})
	trackEventMailing : ->
		if $('.track-mailing').length > 0
			@this = $('.track-mailing')
			category = @this.data('category')
			action = @this.data('action')
			label = @this.data('label')
			Main.trackEvent(category, action, label)

	trackEvent : (cat,act,lab) ->
		_gas.push(['_trackEvent', cat, act, lab])

	forms : ->
		Modernizr.load({
			test: Modernizr.placeholder,
			nope: "#{URL_BASE}js/polyfills/Placeholders.min.js"
		})
		$('.mailing-message').css('height', 'auto').fancybox(
			autoWidth	: true,
			autoHeight	: true,
			# modal		: true,
			fitToView	: false,
			autoSize	: true,
			padding 	: 0
		).click()


Main.init()