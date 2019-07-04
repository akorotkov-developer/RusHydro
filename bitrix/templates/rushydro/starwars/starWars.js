$(function() {
	var beginNewsSW = -1,
		beginLogoSW = -1,
		soundStarWars = {};

	function starWarsSound() {
		soundManager.setup({

			// location: path to SWF files, as needed (SWF file name is appended later.)

			url: homeDirSW+'swf/',

			// optional: version of SM2 flash audio API to use (8 or 9; default is 8 if omitted, OK for most use cases.)
			flashVersion: 9,

			// use soundmanager2-nodebug-jsmin.js, or disable debug mode (enabled by default) after development/testing
			debugMode: false,

			// good to go: the onready() callback

			onready: function() {

				// SM2 has started - now you can create and play sounds!

				soundStarWars = soundManager.createSound({
					id: 'starWars', // optional: provide your own unique id
					url: homeDirSW+'sound.mp3'
				});

				function loopSound(sound) {
				  sound.play({
				    onfinish: function() {
				      loopSound(sound);
				    }
				  });
				}

				loopSound(soundStarWars);

				$('.b-banner_starwars__volume').show();

				starWarsOn();

			},

			// optional: ontimeout() callback for handling start-up failure

			ontimeout: function() {
			}
		});

	}
	function starWarsOn() {
		$('.b-overlay_starwars, .b-banner_starwars__wrap, .b-logo_rushydro__wrap').show();
		$('.logo_flash, .logo').hide();
		beginLogoSW = setTimeout(function() {
			$('.b-banner_starwars__logo').animate(
				{
					width: 50, 
					top: 220, 
					left: 490
				}, 
				{
					duration: 14000, 
					easing: 'swing',
					queue: false
				}
			).show();		
		}, 1000);
		
		beginNewsSW = setTimeout(function() {
			$('.b-banner_starwars__logo')
			.animate(
				{
					opacity: 0
				}, 
				{
					duration: 3000, 
					easing: 'swing'
				});

			$('.b-banner_starwars__news').animate(
				{
					top: '-'+$('.b-banner_starwars__news').height()+'px'
				}, 
				{
					duration: 120000, 
					easing: 'linear',
					complete: function() {
						$('.b-banner_starwars__logo').css({top: '', left: '', width: '', opacity: ''}).addClass('b-banner_starwars__logo-begin');
						$('.b-banner_starwars__repeat').show();
					}
				}
			).removeClass('b-banner_starwars__news-begin');
		}, 11000);
	}

	if (!$('html').hasClass('ie-old') && !$.cookie('showed-starWars')) {
		starWarsSound();
	}

	function defaultSettingSW() {
		$('.b-banner_starwars__news').addClass('b-banner_starwars__news-begin').stop().css('top', '');
		$('.b-banner_starwars__logo').stop().css({top: '', left: '', width: '', opacity: ''}).removeClass('b-banner_starwars__logo-begin').hide();
		$('.b-banner_starwars__repeat').hide();
		$('.b-banner_starwars__volume').removeClass('b-banner_starwars__volume-off');
		soundStarWars.destruct();

	}

	$('.b-banner_starwars__close').click(function() {
		$('.b-banner_starwars__wrap').fadeOut(500, function() {
			$('.b-overlay_starwars, .b-logo_rushydro__wrap, .b-banner_starwars__volume, .b-banner_starwars__repeat').hide();
			$('.logo_flash, .logo').show();
			defaultSettingSW();
			clearTimeout(beginNewsSW);
			clearTimeout(beginLogoSW);
		});
		$.cookie('showed-starWars', true, {path: '/'});
	});

	$('.b-banner_starwars__repeat').click(function() {
		defaultSettingSW();
		starWarsSound();
	});

	$('.b-banner_starwars__volume').click(function() {
		if (!$(this).hasClass('b-banner_starwars__volume-off')) {
			$(this).addClass('b-banner_starwars__volume-off');
			if (isMobile) {
				soundStarWars.stop();
			} else {
				soundStarWars.setVolume(0);
			}
		} else {
			$(this).removeClass('b-banner_starwars__volume-off');
			if (isMobile) {
				soundStarWars.play();
			} else {
				soundStarWars.setVolume(100);
			}
		}
	});

	if (isMobile) {
		$('.b-banner_starwars__volume').addClass('b-banner_starwars__volume-off');
	}
});