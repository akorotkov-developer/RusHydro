$(function() {
	var $popup = $('<div class="b-popup_disclaimer"><div class="b-popup_disclaimer__cont"><div class="b-popup_disclaimer__text"></div><div style="text-align:center"><div class="btn_sbmt in-bl b-popup_disclaimer__accept"><i></i><span></span></div><div class="btn_sbmt in-bl b-popup_disclaimer__cancel" style="margin-left: 20px;"><i></i><span></span></div><div class="clear"></div></div></div></div>'),
	$text = $popup.find('.b-popup_disclaimer__text'),
	$accept = $popup.find('.b-popup_disclaimer__accept'),
	$cancel = $popup.find('.b-popup_disclaimer__cancel'),
	$overlay = $('<div class="b-popup_disclaimer__overlay"></div>'),

	data = {},

	nextStep = function() {
		data.index++;
		if (data.index >= data.windows.length) {
			hidePopup();
			window.open(data.link);
		}
		else {
			$text.html(data.windows[data.index].text);
			$accept.find("span").html(data.windows[data.index].accept);
			$cancel.find("span").html(data.windows[data.index].cancel);
		}
		positionPopup();
	},

	positionPopup = function() {
		if ($(window).height() > $(".b-popup_disclaimer").height())
			$top = $(document).scrollTop()+($(window).height()-$(".b-popup_disclaimer").height())/2;
		else
			$top = $(document).scrollTop();

		$(".b-popup_disclaimer").css({top: $top});
	},

	showPopup = function(link, type) {
		data = {
			'windows': disclaimers[type || 'type1'],
			'index': -1,
			'link': link
		};

		$popup.appendTo('body');
		$overlay.appendTo('body').show();
		$accept.bind('click', nextStep);
		$cancel.bind('click', hidePopup);
		nextStep();

		$(".b-popup_disclaimer").show();
	},

	hidePopup = function() {
		$accept.unbind();
		$cancel.unbind();
		$popup.hide().remove();
		$overlay.hide().remove();
	};

	$('a.doc-close_disclaimer').each(function() {
		var $this = $(this),
		link = $this.attr('href');
		
		$this.attr('href', '#').click(function(e) {
			e.preventDefault();
			showPopup(link, $this.hasClass('doc-close_disclaimer__type2') ? 'type2' : 'type1');
		});
	});
});