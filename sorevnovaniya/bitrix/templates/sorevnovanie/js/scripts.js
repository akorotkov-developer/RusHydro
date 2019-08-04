$(function() {
	/** banners main **/
		curBan = 0;
		nextBan = 1;
		countEl = $("#banners img").length;
		if (countEl > 1)
			bannersInt = setInterval(changeBanners, 5000);
		
		function changeBanners(){
			$("#banners img").eq(curBan).fadeOut(600).removeClass("act");
			$("#banners img").eq(nextBan).fadeIn(600).addClass("act");
			$("#b_nav div").eq(curBan).removeClass("act");
			$("#b_nav div").eq(nextBan).addClass("act");
			curBan = nextBan;
			if (nextBan+1 == countEl)
				nextBan = 0;
			else
				nextBan++;
		}
		
		$("#b_nav div").click(function(){
			if (!$(this).hasClass("act")){
				elIndx = parseInt($(this).text()) - 1;
				$("#b_nav div.act").removeClass("act");
				$(this).addClass("act");
				$("#banners img.act").fadeOut(600).removeClass("act");
				$("#banners img").eq(elIndx).fadeIn(600).addClass("act");
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
	/** banners main **/

	/** likes **/
		var $likes = {}, $counts = {}, likeIds = [], loader = '<img src="/bitrix/templates/sorevnovanie/i/ajax-loader.gif" />',

		getCountElement = function(like) {
			return like.find('.btn-like-cout');
		};
		
		function showPopup(content, parentElement)
		{   
		    var position = parentElement.position();
		
		    $('.popup-captcha').html(content).show().css({top: $(document).scrollTop() + $(window).height()/2 - $('.popup-captcha').height()/2});
		    $('.overlay-fixed').show();
		}
		
		function hidePopup()
		{
		    $('.popup-captcha').hide();
		    $('.overlay-fixed').hide();
		}
		
		$('.overlay-fixed').click(hidePopup);

		$('.ajax-like')
			.each(function() {
				var $this = $(this), id = $this.data('id'), $count = getCountElement($this);

				$likes[id] 	= $this;
				$counts[id] = $count;

				likeIds.push(id);

				$count.html(loader);
			})
			.click(function() {
				var $this = $(this), 
				id = $this.data('id'), 
				$count = $counts[id],
				handleVoteResponse = function(response)
		        {
		            $count.html(prevCount);
		        
		            if (!isNaN(parseInt(response))) {
					    $count.html(response);
		                hidePopup();
		            } else {
		                showPopup(response, $count);
		            
		                $('.popup-captcha').find('form').submit(function(e) {
		                    e.preventDefault();
		                    
		                    var $form = $(this);
		                    
		                    $.ajax({
				                type: 'POST',
				                url: '/vote/add.php',
				                data: $form.serialize(),
			                }).done(handleVoteResponse);
		                });
		            }
		        };

				if ($this.data('clicked') || $this.data('closed')) return;
				$this.data('clicked', true);

                var prevCount = $count.html();
				$count.html(loader);
				
				$.ajax({
					type: 'POST',
					url: '/vote/add.php',
					data: {id: id}
				})
				.done(handleVoteResponse)
				.always(function() {
					$this.data('clicked', false);
				});
			});

		if (likeIds.length) {
			$.ajax({
				type: 'POST',
				url: '/vote/list.php',
				dataType: 'json',
				data: {ids: likeIds}
			})
			.done(function(data) {
				for (var id in data.count) {
					if (!$likes[id]) continue;

					$likes[id].find('.btn-like-cout')
						.html(data.count[id]);
				}
			});
		}
	/** likes **/
	
	$("#menu > div.item").hover(
		function(){
			$(this).find(".top-sub").stop(true, true).slideDown(300);
		},
		function(){
			$(this).find(".top-sub").stop(true, true).slideUp(300);
		}
	);
});
