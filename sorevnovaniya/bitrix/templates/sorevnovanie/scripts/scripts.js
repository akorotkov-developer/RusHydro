$(function(){
	
	bheight = $('body,html').height();
	
	$('#maintop').css('height',bheight)
	
	$(window).resize(function(){
		bheight = $('body,html').height();	
		$('#maintop').css('height',bheight)
	})
	
	$('.to-scroll').click(function(){
		
		if($(window).scrollTop() < 400) {
			$('body,html').animate({scrollTop:bheight})
		} 
		else {
			$('body,html').animate({scrollTop:0})
		}	
	})
	
	$(window).scroll(function(){
		if($(window).scrollTop() < 400) {
			$('.to-scroll').removeClass('reverse')
		} 
		else {
			$('.to-scroll').addClass('reverse')
		}	
	})
	
	
})

function popupclose(){
	$('.shadow_all').fadeOut(); $('.popups').slideUp();
}
function popupshow(block){
	$('.shadow_all').fadeIn(); $('.'+block).slideDown();
}

Share = {
	vkontakte: function(purl, ptitle, pimg, text) {
		url  = 'http://vkontakte.ru/share.php?';
		url += 'url='          + location;
		Share.popup(url);
	},
	odnoklassniki: function(purl, text) {
		url  = 'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1';
		url += '&st._surl='    + location;
		Share.popup(url);
	},
	facebook: function(purl, ptitle, pimg, text) {
		url  = 'http://www.facebook.com/sharer.php?s=100';
		url += '&p[url]='       + location;
		Share.popup(url);
	},
	twitter: function(purl, ptitle) {
		url  = 'http://twitter.com/share?';
		url += '&url='      + location;
		Share.popup(url);
	},
	mailru: function(purl, ptitle, pimg, text) {
		url  = 'http://connect.mail.ru/share?';
		url += 'url='          + location;
		Share.popup(url)
	},
	livejournal: function(purl, ptitle, pimg, text) {
		url  = 'http://www.livejournal.com/update.bml';		
		Share.popup(url)
	},    
	popup: function(url) {
		window.open(url,'','toolbar=0,status=0,width=626,height=436');
	}
};