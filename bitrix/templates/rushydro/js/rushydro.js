$(document).ready(function(){

	$(".col_lft a[rel^='prettyPhoto']")
		.prettyPhoto({
			social_tools: false,
			deeplinking: false
		});

	$("a[href*='?iframe'], a[rel^='prettyPhoto[iframe]']")
		.prettyPhoto({
			social_tools: false,
			allow_resize: false,
			deeplinking: false
		});

	var valInputSearch = $("#search input:text").attr("title");
	$("#search input:text").focus(function(){
		if ($(this).val() == valInputSearch)
			$(this).val("").css("color","#000");
	});

	$("#search input:text").blur(function(){
		if ($.trim($(this).val()) == "")
			$(this).val(valInputSearch).css("color","#808080");
	});

	$("a.subscribe_btn").mouseup(function(){$(this).removeClass("act")});
	$("a.subscribe_btn").mouseleave(function(){$(this).removeClass("act")});

	$("a.subscribe_btn").mousedown(function(){
		if (!$("a.subscribe_btn").hasClass("act"))
			$(this).addClass("act");
	});

	/** banners main **/
	curBan = 0;
	nextBan = 1;
	countEl = $("#banners .slide").length;
	if (countEl > 1)
		bannersInt = setInterval(changeBanners, 5000);
	
	$("#banners .slide").not('.act').fadeOut(0);
	
	function changeBanners(){
		$("#banners .slide").eq(curBan).fadeOut(600).removeClass("act");
		$("#banners .slide").eq(nextBan).fadeIn(600).addClass("act");
		$("#b_nav a").eq(curBan).removeClass("act").css("top","0");
		$("#b_nav a").eq(nextBan).addClass("act").animate({top: "-3px"},200, function(){$(this).animate({top: "0"},100);});
		curBan = nextBan;
		if (nextBan+1 == countEl)
			nextBan = 0;
		else
			nextBan++;
	}

	$("#b_nav a").click(function(){
		if (!$(this).hasClass("act")){
			elIndx = parseInt($(this).text()) - 1;
			$("#b_nav a.act").removeClass("act").css("top","0");
			$(this).addClass("act").animate({top: "-3px"},200, function(){$(this).animate({top: "0"},100);});
			$("#banners .slide.act").fadeOut(600).removeClass("act");
			$("#banners .slide").eq(elIndx).fadeIn(600).addClass("act");
			curBan = elIndx;
			if (elIndx+1 == countEl)
				nextBan = 0;
			else
				nextBan = elIndx+1;
		}
		return false;
	});

	$("#banners").hover(
		function(){
			clearInterval(bannersInt);
		},
		function(){
			if (countEl > 1)
				bannersInt = setInterval(changeBanners, 5000);
		}
	);

	$("#banners_eng_btns a").hover(
		function() {
			$(this).stop().animate({height: 73}, 300);
			$(this).find("i").stop(true, true).fadeIn(300);
		},
		function() {
			$(this).stop().animate({height: 60}, 300);
			$(this).find("i").stop(true, true).fadeOut(300);
		}
	);
	/** banners main **/

	$("div.rht_news div.item").hover(
		function(){
			$(this).find(".n_txt").stop().animate({top: 30}, 300);
		},
		function(){
			$(this).find(".n_txt").stop().animate({top: 60}, 300);
		}
	);

	$(".h_indexes .item").click(function(){
		if (!$(this).hasClass("act_indx")){
			$(".h_indexes .item.act_indx").removeClass("act_indx");
			if($("#b_stocks:visible").length == 1){
				$("#b_stocks").css("display","none");
				$("#b_indexes").css("display","block");
			}else{
				$("#b_stocks").css("display","block");
				$("#b_indexes").css("display","none");
			}
			$(this).addClass("act_indx");
		}
	});

	$("#fil_dzo").css("display","none");

	$(".b_filials .item span").click(function(){
		if (!$(this).parent().hasClass("act")){
			$(".b_filials .item.act").removeClass("act");
			if($("#fil_filials:visible").length == 1){
				$("#fil_filials").css("display","none");
				$("#fil_dzo").css("display","block");
				$("#fil_arr").css("background-position","135px 0");
			}else{
				$("#fil_filials").css("display","block");
				$("#fil_dzo").css("display","none");
				$("#fil_arr").css("background-position","30px 0");
			}
			$(this).parent().addClass("act");
			$("div.jspPane").css("top","0px");
			$('.fil_scroll').jScrollPane({showArrows:true, speed: 113});
		}
	});

	/*** map ***/
	$("#fil_switch .item span").click(function(){
		if (!$(this).parent().hasClass("act")){
			if ($("#fil_cont:visible").length == 0){
				$(this).parent().addClass("act");
				if ($(this).parent().index() == 0){
					$("#fil_filials").css("display","block");
					$("#fil_dzo").css("display","none");
					$("#fil_arr").css("background-position","20px 0");
				}
				else{
					$("#fil_dzo").css("display","block");
					$("#fil_filials").css("display","none");
					$("#fil_arr").css("background-position","95px 0");
				}
				$("#fil_cont").fadeIn(200);
			}else{
				$("#fil_switch .item.act").removeClass("act");
				if($("#fil_filials:visible").length == 1){
					$("#fil_filials").css("display","none");
					$("#fil_dzo").css("display","block");
					$("#fil_arr").css("background-position","95px 0");
				}else{
					$("#fil_filials").css("display","block");
					$("#fil_dzo").css("display","none");
					$("#fil_arr").css("background-position","20px 0");
				}
				$(this).parent().addClass("act");
			}
			$("div.jspPane").css("top","0px");
			$('.fil_scroll').jScrollPane({showArrows:true, speed: 113});
		}
	});

	$("#fil_close span").click(function(){
		$("#fil_cont").fadeOut(200);
		$("#fil_switch .item.act").removeClass("act");
		curFilMap();
	});

	$("#fil_cont a").bind("mouseover", function(){
		nameFil = $(this).attr("name");
		if ($("#dot_"+nameFil).length == 1){
			$("#fil_map i.act").removeClass("act");
			$("#dot_"+nameFil).addClass("act");
			filTxt = $(this).html();
			posElMap = $("#dot_"+nameFil).position();
			if (posElMap.left >= 160)
				$("#fil_name").addClass("fil_name_rht");
			else
				$("#fil_name").removeClass("fil_name_rht");
			$("#fil_name").hide();
			$("#fil_name").find("span").html(filTxt);
			$("#fil_name").css({left: posElMap.left + 5, top: posElMap.top - 4});
			$("#fil_name").css({top: posElMap.top});
			$("#fil_name").stop(true, true).fadeIn(300);
		}
	});

	function curFilMap(){
		$("#fil_map i.act").removeClass("act");
		if ($("#dot_"+curFil).length == 1){
			$("#dot_"+curFil).addClass("act");
			posElMap = $("#dot_"+curFil).position();
			if (posElMap.left >= 160)
				$("#fil_name").addClass("fil_name_rht");
			else
				$("#fil_name").removeClass("fil_name_rht");
			$("#fil_name").css({left: posElMap.left + 5, top: posElMap.top});
			$("#fil_name span").html(curFilName);
		}
		else
			$("#fil_name").css({display: "none"});
	}
	/*** map ***/

	/** navigation news **/
	$("#next_news_arr").hover(
		function(){
			$("#next_news").stop().css("display","block").animate({bottom: "25px", opacity: 1},200);
		},
		function(){
			$("#next_news").stop().animate({bottom: "35px", opacity: 0},200, function(){$(this).css("display","none")});
		}
	);
	$("#prev_news_arr").hover(
		function(){
			$("#prev_news").stop().css("display","block").animate({bottom: "25px", opacity: 1},200);
		},
		function(){
			$("#prev_news").stop().animate({bottom: "35px", opacity: 0},200, function(){$(this).css("display","none")});
		}
	);
	/** navigation news **/

	/** main menu **/
	var addClass = false;
	$("#menu div.item").hover(
		function(){
			$(this).find("div.sub_menu").css("display","block").stop(true,true);
			if ($(this).hasClass("act"))
				addClass = true;
			else{
				$(this).addClass("act").css("z-index","10");
				addClass = false;
			}
		},
		function(){
			$(this).find("div.sub_menu").css("display","none");
			if (!addClass)
				$(this).removeClass("act").css("z-index","1");;
		}
	);
	$("#menu div.s_sub_menu").hover(
		function(){
			$(this).find("div.menu_lvl_last").stop(true,true).slideDown(200);
			$(this).addClass("active");
		},
		function(){
			$(this).find("div.menu_lvl_last").css("display","none");
			$(this).removeClass("active");
		}
	);
	/** main menu **/

	/** Проверяем загрузку картинок **/
	$.preloadImages = function () {
		if (typeof arguments[arguments.length - 1] == 'function') {
			var callback = arguments[arguments.length - 1];
		} else {
			var callback = false;
		}
		if (typeof arguments[0] == 'object') {
			var images = arguments[0];
			var n = images.length;
		} else {
			var images = arguments;
			var n = images.length - 1;
		}
		var not_loaded = n;
		for (var i = 0; i < n; i++) {
			jQuery(new Image()).attr('src', images[i]).load(function() {
				if (--not_loaded < 1 && typeof callback == 'function') {
					callback();
				}
			});
		}
	}
	/** Проверяем загрузку картинок **/

	/** social scroll **/
	if ($(".social-scroll-gallery").length > 0) {

		var widthScroll = 620,
			dist = 0,
			arSocGal = [],
			intScroll = 0,
			widthAllImg = 0,
			loadCmoplete = false,
			$scrollCont = $("#social-scroll .scrollCont"),
			timeoutCall = -1,
			arSocGalUrl = [];

		$(".gallery_blocks a").each(function() {
			arSocGal.push($(this));
			arSocGalUrl.push($(this).find('img').attr('src'));
		});

		$(".gallery_blocks").remove();

		for (var k=0; k<arSocGal.length; k++) {
			arSocGal[k].appendTo($scrollCont);
		}

		$("#social-scroll a[rel^='prettyPhoto']")
			.prettyPhoto({
				social_tools: false,
				deeplinking: false
			});

		var countEl = $("#social-scroll a").length - 1;

		function intervalFunc()
		{
			intScroll = setInterval(autoScroll, 10);
		}

		$.preloadImages(arSocGalUrl, function () {
			$("#social-scroll").find("img").each(function(){
				widthAllImg += $(this).width();
			});
			widthAllImg = widthAllImg + countEl*4;
			loadCmoplete = true;
			timeoutCall = setTimeout(intervalFunc, 1000);
		});


		$("#social-scroll").hover(
			function(){
				if (loadCmoplete){
					$scrollCont.animate().stop();
					clearInterval(intScroll);
					clearTimeout(timeoutCall);
				}
			},
			function(){
				if (loadCmoplete)
					intervalFunc()
			}
		);


		function autoScroll()
		{
			dist = Math.abs($scrollCont.position().left);
			$scrollCont.css("left", "-" + (dist+1) + "px");
			if (widthAllImg-dist <= widthScroll)
			{
				clearInterval(intScroll);
				$scrollCont.delay(1000).animate({left: 0},900, function(){timeoutCall = setTimeout(intervalFunc, 1000); dist = 0;});
			}
		}

	}
	/** social scroll **/

	$(".menu-social_slider .item").click(function(){
		nextElAct = $(this).next().hasClass("item-act");
		if (!nextElAct) {
			$(this).next().show();

			$(".menu-social_slider .item-act").hide().removeClass("item-act").prev().removeClass("item-head-act");

			$(this).addClass("item-head-act").next().addClass("item-act");
		}
	});

	$("#history-years .item").click(function(){
		heightEl = $(this).find("div.history-txt").height();
		openEl = $(this).find("div.history-wrap");
		if (heightEl > 44)
			if (openEl.hasClass("open")) {
				openEl.stop().animate({height: 41}, 300).removeClass("open");
				setTimeout(function(){openEl.find('.bg').css('z-index','1');}, 300);

				$(this).find('.open_history').html('Развернуть');
			}
			else {
				openEl.stop().animate({height: heightEl + 2}, 300).addClass("open");
				$(this).find('.bg').css('z-index','-1');
				$(this).find('.open_history').html('Свернуть');

			}
	})

	/** content accordion **/
	$(".bl-accordion .bl-accordion-head").click(function(){
		var selfE = $(this);
		selfE.next().slideToggle(400, function(){selfE.toggleClass("act");});
		return false;
	});
	/** content accordion **/

	/** search **/
	$('.search-sort span').click(function(e) {
		var $this = $(this);

		$('.search-sort .active').removeClass('active');
		$this.addClass('active');
		$this.closest('form').find('input[name="how"]').val($this.data('how'));
	});

	/** table colors **/
	$('table.coolTableColor tr:even').addClass('tr_tbl_bg');
	/** table colors **/

	$(".inp-file input").bind({
		change: function() {
			$(this).parents('.inp-file-wrap').find(".inp-file-txt").text((location.href.indexOf('eng.rushydro') < 0 ? 'Выбран: ' : 'Selected: ') + $(this).val().replace(/.*(\/|\\)/, ""));
		}
	});

	$('.ie-8 .col_lft img').each(function() {
		if ($(this).attr('width') > 620) $(this).css('width', '620px');
	});

	if ($('.ban_rht_wrap .ban_rht_item').length > 1) {
		sliderBannersRight = $('.ban_rht_wrap').bxSlider({
			slideSelector: 'div.ban_rht_item',
			mode: 'fade',
			controls: false,
			auto: true,
			pause: 5000,
			onSlideAfter: function() {sliderBannersRight.startAuto();}
		});
	}

	if ($('.gosa').length) {
		(function() {
			var $wrapper = $('.gosa'),
				after = null;

			function renderItems(items)
			{
				if (!items.length) {
					return;
				}

				var i, $item, itemsCount = $wrapper.find('.online-gosa-item').length;

				for (i = 0; i < items.length; i++) {
					$item = $('<div class="online-gosa-item" data-id="'+(itemsCount+i)+'"><div class="online-gosa-item-bg"></div><div class="online-gosa-item-txt">'+items[i].text+'</div></div>');
					if (itemsCount) {
						$item.css({
							opacity: 0
						}).addClass('online-gosa-item-act');
					}

					$wrapper.append($item);

					if (itemsCount) {
						$('.online-gosa-item[data-id='+(itemsCount+i)+']').animate({opacity: 1},500, function() {$(this).find('.online-gosa-item-bg').fadeOut(600);});
					}

					after = items[i].date;
				}
			}

			function scheduleUpdate()
			{
				setTimeout(loadItems, 15000);
			}

			function loadItems()
			{
				return $.ajax({
					url: '/gosa.php',
					dataType: 'json',
					data: {after: after},
				})
					.done(renderItems)
					.done(scheduleUpdate);
			}

			loadItems();
		})();
	}

	$('.ban_rht_item:first').click(function() {
		ga('send', 'event', 'banner_rao', 'click');
	});
	$('#history-years.bg_items .item').each(function(){
		heightEl = $(this).find("div.history-txt").height();
		color = $(this).css('backgroundColor');
		if(heightEl > 44){
			$(this).append('<div class="open_history">Развернуть</div>');
			$(this).find('.history-txt li:first').css('position','relative').append('<div style="height: 41px;left:-10px; position: absolute;top: 0;width:110%; background: -moz-linear-gradient(top, rgba(0,0,0,0) 0%, rgba(0,0,0,0.0) 0%, '+color+' 100%);background: -webkit-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,0.01) 1%,'+color+' 100%);background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0.01) 1%,'+color+' 100%);" class="bg"></div>');
		}else{
			$(this).css('cursor','default');
		}

	});
});
