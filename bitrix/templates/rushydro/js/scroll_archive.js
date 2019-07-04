$(document).ready(function(){
	if ($("#archive").length == 1){		
		$scrollBlock = $("#archive div.items");		
		$bar = $("#bar");
		widthBar = $bar.width();

		widthElem = 0;
		
		$("#archive a").each(function(){
			widthElem += $(this).width();
		});
		
		widthElem = widthElem + $("#archive a").length*20;
		
		$scrollBlock.css("width",widthElem+80);
		$("#archive div.wrapScroll").css({overflow: "hidden", height: 35});
		
		move = false;
		flagClick = true;
		clickEl = false;
		
		$($bar).hover(
			function(){
				flagClick = false;
			},
			function(){
				flagClick = true;
			}
		);
		
		if (widthElem > 600 && $("#archive").length == 1)
		{
			$($bar).mousedown(function(){
				move = true;
			});
			$(document).mouseup(function(){
				move = false;
			});	
			$(document).mousemove(function(){
				if (move)
					moveBar();
			});
		}
		
		$("div.barscroll").click(function(e){
			if (flagClick == true)
			{		
				/*positionYear = $("#archive .items .year.act").position();
				positionYear = positionYear.left;
				widthYear = $("#archive .items .year.act").width();	*/
				if (e.layerX)
					x = e.layerX - 5 - widthBar/2;
				else if (e.offsetX)
					x = e.offsetX - 5 - widthBar/2;
				
				if (x+widthBar > $(this).width())
				{
					$($bar).animate({left: ($(this).width()-widthBar)}, 200);
					if (widthElem > 600)
						$($scrollBlock).stop().animate({left: -((widthElem-600+40)/(600-widthBar)*($(this).width()-widthBar))},
							{
								duration: 200
								/*step: function(now) {
									var data = -now;
									if (positionYear <= data)
										$("#yearL").css("display","block");
									else
										$("#yearL").css("display","none");
										
									if (positionYear >= data+600-widthYear-20)
										$("#yearR").css("display","block");
									else
										$("#yearR").css("display","none");
										
									$year = $("#archive .items .year.act").text();
									$("#yearL").text($year);
									$("#yearR").text($year);
								}*/
							}
						);
				}
				else
					if(x<=0)
					{
						$($bar).animate({left: 0}, 200);
						if (widthElem > 600)
							$($scrollBlock).stop().animate({left: 0},
								{
									duration: 200
									/*step: function(now) {
										var data = -now;
										if (positionYear <= data)
											$("#yearL").css("display","block");
										else
											$("#yearL").css("display","none");
											
										if (positionYear >= data+600-widthYear-20)
											$("#yearR").css("display","block");
										else
											$("#yearR").css("display","none");
											
										$year = $("#archive .items .year.act").text();
										$("#yearL").text($year);
										$("#yearR").text($year);
									}*/
								}
							);
					}
					else
					{
						$($bar).animate({left: x}, 200);
						if (widthElem > 600)
							$($scrollBlock).stop().animate({left: -((widthElem-600+40)/(600-widthBar)*x)},
								{
									duration: 200
									/*step: function(now) {
										var data = -now;
										if (positionYear <= data)
											$("#yearL").css("display","block");
										else
											$("#yearL").css("display","none");
											
										if (positionYear >= data+600-widthYear-20)
											$("#yearR").css("display","block");
										else
											$("#yearR").css("display","none");
											
										$year = $("#archive .items .year.act").text();
										$("#yearL").text($year);
										$("#yearR").text($year);
									}*/
								}
							);
					}
				
			}	
		}); 
		
		distPosit = 0;
		/*positionYear = $("#archive .items .year.act").position();
		positionYear = positionYear.left;*/
		positionMonth = $("#archive .items .month .act").position();
		if (widthElem - positionMonth.left < 140)
			positionMonth = positionMonth.left - 490;
		else
			positionMonth = positionMonth.left - 400;
		/*txtYear = $("#archive .items .year.act").text();
		widthYear = $("#archive .items .year.act").width();*/
		
		posBarLoad = (positionMonth*(600-widthBar))/(widthElem-600+40);

		if ((positionMonth+400) < 550)
			posBarLoad = 0;
		else
			posBarLoad = posBarLoad;
			
			
		$("#bar").css("left",posBarLoad);
		
		if ((positionMonth+400) < 550)
			posBarLoad = 0;
		else
			posBarLoad = (widthElem-600+40)/(600-widthBar)*posBarLoad;
			
		$($scrollBlock).css("left",-(posBarLoad));	
		
		/*if (positionYear <= posBarLoad)
			$("#yearL").css("display","block");
		else
			$("#yearL").css("display","none");
			
		if (positionYear >= posBarLoad+600-widthYear-20)
			$("#yearR").css("display","block");
		else
			$("#yearR").css("display","none");
		
		if (!clickEl){
			$("#yearL").text(txtYear);
			$("#yearR").text(txtYear);	
		}*/
		
		function moveBar()
		{				
			positionBar = $($bar).position();
			distPosit = (widthElem-600+40)/(600-widthBar)*positionBar.left;
			
				
			if(move==true)
			{
				$($scrollBlock).css({left: -(distPosit)});
				/*if (positionYear <= distPosit)
					$("#yearL").css("display","block");
				else
					$("#yearL").css("display","none");
					
				if (positionYear >= distPosit+600-widthYear-20)
					$("#yearR").css("display","block");
				else
					$("#yearR").css("display","none");
				
				if (!clickEl){
					$("#yearL").text(txtYear);
					$("#yearR").text(txtYear);	
				}*/
			}

		}
		
		
		/*$($scrollBlock).find("a").click(function(){
			if (!$(this).hasClass("year"))
			{
				$($scrollBlock).find("div.month a.act").removeClass("act");
				$(this).addClass("act");
			}
		});*/
	}
});