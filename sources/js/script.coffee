@map = false

@mapInit = ()->
	mapOptions =
		zoom                   : 2
		scrollwheel            : false
		disableDoubleClickZoom : true
		mapTypeControl         : false
		streetViewControl      : false
		panControl             : false
		zoomControlOptions     : {
			style: google.maps.ZoomControlStyle.LARGE,
			position: google.maps.ControlPosition.LEFT_CENTER
		}
		center : new google.maps.LatLng(46.50443728, 17.93459300)
		styles : [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#333333"},{"gamma":"3"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"weight":1.2},{"lightness":"17"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#e1e1e1"},{"lightness":"0"},{"gamma":"1.0"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c8c8c8"},{"lightness":"21"},{"gamma":"1"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#505050"},{"lightness":"0"},{"gamma":"5"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":"10"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":"10"}]},{"featureType":"transit.line","elementType":"geometry.fill","stylers":[{"color":"#cdcdcd"}]},{"featureType":"transit.station.rail","elementType":"labels.icon","stylers":[{"visibility":"on"},{"gamma":"2.5"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"##000000"},{"lightness":"0"},{"gamma":"4.5"}]}]
	
	mapElement = $('.modal__map')[0]
	map = new google.maps.Map(mapElement, mapOptions)
	cords = [
		new google.maps.LatLng(67.074532, 71.069804),
		new google.maps.LatLng(65.880861, 73.003398),
		new google.maps.LatLng(65.372506, 77.222148),
		new google.maps.LatLng(63.157574, 104.819804),
		new google.maps.LatLng(59.88725, 110.972148),
		new google.maps.LatLng(55.865354, 125.561991),
		new google.maps.LatLng(56.93747, 148.237773),
		new google.maps.LatLng(58.258556, 151.401835)
	]
	$.each cords, ()->
		marker = new google.maps.Marker
			position: this
			map: map
			icon: '/layout/images/flag.png'
		google.maps.event.addListener marker, 'click', ()->
			map.setZoom 8
			map.setCenter marker.getPosition()
	
	map.setCenter mapOptions['center']

	$('#Map').data 'loaded', true

end = 'transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd'

delay = (ms, func) -> setTimeout func, ms

size = ->
	$('body:not(.text) .page').css
		minHeight: $(window).height()
	
	if $('.scroll').length > 0
		$('.scroll').perfectScrollbar 'update'
	
	if $(window).width()/$(window).height() > 16/9
		$('.video').height ($(window).width()/16)*9
	else
		$('.video').width ($(window).height()/9)*16

Array.prototype.remByVal = (val)->
	for i in [0...this.length]
				if this[i] == val
						this.splice(i, 1)
						i--;
		return this;

$(document).ready ->
	$("body").queryLoader2
		barColor        : "#cbbc9c"
		backgroundColor : "white"
		percentage      : true
		barHeight       : 5
		minimumTime     : 200
		fadeOutTime     : 1000
	
	$('.fotorama').hoverIntent
		over: ->
			$(this).data('fotorama').stopAutoplay()
		out: ->
			$(this).data('fotorama').startAutoplay()

	$('#News').on 'show.bs.modal', (a,b)->
		url = $(a.relatedTarget).data 'url'
		$('#News .news').load url, ->
			$("#News .carousel").waterwheelCarousel
				autoPlay: 2000
				speed: 0

	#$('#Map').modal()

	$('#Map .country').click (e)->
		if $(this).parent().find('ul').length > 0
			block = $(this).parent().find('ul')
			if $(this).parent().hasClass 'open'
				block.velocity
					properties: "transition.slideUpOut"
					options:
						duration: 500
						complete: ->
							$(this).parents('li').removeClass 'open'
			else
				if $('#Map .countries li.open ul').length > 0
					$('#Map .countries li.open ul').velocity
						properties: "transition.slideUpOut"
						options:
							duration: 500
							complete: ->
								$(this).parents('li').removeClass 'open'
								block.velocity
									properties: "transition.slideDownIn"
									options:
										duration: 500
										complete: ->
											$(this).parents('li').addClass 'open'
				else
					block.velocity
						properties: "transition.slideDownIn"
						options:
							duration: 500
							complete: ->
								$(this).parents('li').addClass 'open'

		e.preventDefault()

	$('#Map').on 'shown.bs.modal', (e)->
		delay 300, ->
			if !$('#Map').data 'loaded'
				$.getScript 'https://maps.googleapis.com/maps/api/js?callback=mapInit'



	if $('.scroll').length > 0
		$('.scroll').perfectScrollbar
			suppressScrollX: true

	$('#enter a').click (e)->
		e.preventDefault()
		$('#enter').velocity
			properties: "transition.fadeOut"
			options:
				duration: 300
				complete: ()->
					$(this).remove()
		
	x = undefined
	$(window).resize ->
		clearTimeout(x)
		x = delay 200, ()->
			size()

	scrollTimer = false
	$(window).scroll ->
		clearTimeout scrollTimer
		if !$('.scroll-fix').hasMod 'on'
			$('.scroll-fix').mod 'on', true
		scrollTimer = delay 300, ()->
			$('.scroll-fix').mod 'on', false

	setMod = (el, mod, val, mods, all)->
		el.mod mod, val
		delay 100, ->
			mods = mods.remByVal(mod)
			all	= all.remByVal(mod)
			changeMods el, mods, all
	
	changeMods = (el, mods, all)->
		$.each all, (k, mod) ->
			if $.inArray(mod, mods) != -1
				if !el.hasMod mod
					#console.log 'add', mod
					setMod el, mod, true, mods, all
					return false
			else
				if el.hasMod mod
					#console.log 'del', mod
					setMod el, mod, false, mods, all
					return false

	$('.nav > ul > li').hoverIntent
		over: ->
			if $(this).find('ul').length > 0
				$(this).find('ul').velocity
					properties: "transition.slideDownIn"
					options:
						duration: 300
		out: ->
			if $(this).find('ul').length > 0
				$(this).find('ul').velocity
					properties: "transition.slideUpOut"
					options:
						duration: 300

	$('.industies').elem('slider')
	.on('fotorama:ready', (a)->
		$('.fotorama__arr--prev').html $('.arrow__prev').html()
		$('.fotorama__arr--next').html $('.arrow__next').html()
	)
	.on('fotorama:showend', (a,b,c)->
		$('.industies').elem('nav').find('a').removeClass 'active'
		$("a[href='##{b.activeFrame.id}']").addClass 'active'
	).fotorama()
		
	$('.industies').elem('nav').find('a').click (e)->
		$('.industies').elem('slider').data('fotorama').show parseInt($(this).data('id'))
		e.preventDefault()

	$('.public').elem('slider')
	
	.on('fotorama:ready',->
		$('.public').elem('slider').mod 'init', true
		$('.fotorama__arr--prev').html $('.arrow__prev').html()
		$('.fotorama__arr--next').html $('.arrow__next').html()
	)
	.on('fotorama:show', (a,b,c)->
		$(b.activeFrame.html).find('.public__pack')
			.removeClass 'public__pack--active'	
			.addClass 'public__pack--disable'
	)
	.on('fotorama:showend', (a,b,c)->
		$(b.activeFrame.html).find('.public__pack').removeClass 'public__pack--disable'
		$('.public').elem('nav').find('a').removeClass 'active'
		$("a[href='##{b.activeFrame.id}']").addClass 'active'
		$('.public').elem('pack').off('click').on 'click', (e)->
			if !$(this).hasMod 'active'
				$(b.activeFrame.html).find('.public__pack').removeClass 'public__pack--active'
				$(this)
					.removeClass 'public__pack--disable'
					.mod 'active', true
				
				$(b.activeFrame.html).find('.public__pack:not(.public__pack--active)').addClass 'public__pack--disable'
			else
				$('.public__pack--active').addClass('end').one 'webkitAnimationEnd oanimationend msAnimationEnd animationend', ->
					$(this)
						.removeClass 'public__pack--active'	
						.removeClass 'end'
				$('.public__pack').removeClass 'public__pack--disable'
			
			e.preventDefault()
	
	).fotorama()
	
	$('.public').elem('nav').find('a').click (e)->
		$('.public').elem('slider').data('fotorama').show parseInt($(this).data('id')) - 1
		e.preventDefault()
	

	$('a:not([data-toggle="modal"])').click (e)->
		id = "#" + $(this).attr('href').split('#')[1]
		if $("#{id}").length > 0
			if $("#{id}").hasClass 'modal'
				$("#{id}").modal()
			else
				$('.slider').moveTo $("#{id}").index()+1
			e.preventDefault()

	$('.loader, .enter').on 'scroll mousewheel touchstart touchmove DOMMouseScroll MozMousePixelScroll', (e)->
		e.preventDefault();
		e.stopPropagation();

	delay 300, ()->
		size()
		sliderTimer = false
		

		#$('.slider').flipBook()
		if $('.slider').length > 0 
			$('.slider').show().onepage_scroll
				animationTime: 1000
				pagination: false
				sectionContainer: "section"
				loop: false
				#easing : 'cubic-bezier(.175, .885, .32, 1)'
				afterMove: (a, e)->
					block	 = $(".slider section:nth-child(#{a})")
					$(".slider section video").each ->
						this.pause()
					if block.find('video').length > 0
						block.find('video')[0].play()


					if(history.pushState)
						history.pushState null, null, '#' + block.attr 'id'
					else
						location.hash = block.attr 'id'

				beforeMove: (a, e)->
					nav		 = $('.nav')
					block	 = $(".slider section:nth-child(#{a})")
					
					# Nav links
					nav.elem('item').mod 'active', false
					nav.find("a[href*='#{block.attr('id')}']").addClass 'nav__item--active'
					
					# Nav colors
					if block.data('mods')
						mods		= block.data('mods').split(', ')
						navMods = ['gold', 'white', 'brown']
						
						changeMods nav, mods, navMods

		if location.hash
			if $("#{location.hash}").hasClass 'modal'
				$("#{location.hash}").modal()
			else
				$('.slider').moveTo $("#{location.hash}").index() + 1
		
		$('.scroll')
			.hoverIntent
				over: ->
					$(this).parents('.page').data 'fix', true
				out: ->
					$(this).parents('.page').data 'fix', false
			
		$('#loader').velocity
			properties: "transition.fadeOut"
			options:
				duration: 300
				complete: ()->
					$(this).remove()

		$('body').addClass 'loaded'
		if $.browser.mobile
			$('body').addClass 'mobile'


		delay 500, ->
			paths = $('#home path:not(defs path)')
			paths.each (i, e) ->
				e.style.strokeDasharray = e.style.strokeDashoffset = e.getTotalLength()
				return
			tl = new TimelineMax
			tl.add [
				TweenLite.to(paths.eq(0), 1,
					strokeDashoffset: 0
					delay: 0.0).duration(8)
				TweenLite.to(paths.eq(1), 1,
					strokeDashoffset: 0
					delay: 0.5).duration(8)
			]






