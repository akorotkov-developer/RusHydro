// JavaScript Document

$(document).ready(function(){
	
	if (!$.browser.webkit) {
		
		$('input[placeholder], textarea[placeholder]').blur(function(){ 
			
			if ($(this).val()=='') {
				$(this).val($(this).attr('placeholder'));
				$(this).addClass('m-placeholder');
			}
			
		}).focus(function(){
			
			$(this).removeClass('m-placeholder');
			if ($(this).val()==$(this).attr('placeholder'))
				$(this).val('');
			
		}).each(function(){
			
			if ( ($(this).val()=='') || ($(this).val()==$(this).attr('placeholder')) ) {
				$(this).val( $(this).attr('placeholder') );
				$(this).addClass('m-placeholder');
			}
			
			var form = $(this).closest('FORM');
			if (form.length)
				form.submit(function(){
					if ($(this).val()==$(this).attr('placeholder'))
						$(this).val('');
				});
			
		});
	}
	
	//затенение	
	$('.shadowAll').css('opacity', 0)
	
	$('.makeShadow').click(function(){
		$('.shadowAll').css('display','block')
		$('.shadowAll').animate({opacity:.2})
	})	
	
	//создание теней в полях формы
	$('.needshadow').focus(function(){$(this).addClass('shadow')})
	$('.needshadow').blur(function(){$(this).removeClass('shadow')})
	
	//имитация селекта
	$('.select-imitate .name').on('click',function(){
		if($(this).parents('.select-imitate').hasClass('opened')) {			
			$(this).blur()
			$(this).parents('.select-imitate').find('.select-imitate-popup-body').slideUp('fast'),
			$(this).parents('.select-imitate').find('.select-imitate-popup').css('display','none')
			$(this).parents('.select-imitate').removeClass('opened')			
			}
		
		else {
			
			$('.select-imitate-popup-body').slideUp('fast'),
			$('.select-imitate-popup').css('display','none')
			$('.select-imitate').removeClass('opened')			
			
			$(this).blur()	
			$(this).parents('.select-imitate').find('.select-imitate-popup').css('display','block'),
			$(this).parents('.select-imitate').find('.select-imitate-popup-body').slideDown('fast')	
			$(this).parents('.select-imitate').addClass('opened')			
		}		
		
	})
	
	$('.select-imitate-popup span').on('click',function(){
		v = $(this).text()
		$(this).parents('.select-imitate').find('input').val(v)
		$(this).parents('.select-imitate').find('.name span').text(v)
		$(this).parents('.select-imitate-popup').find('span').removeClass('selected')
		$(this).addClass('selected')
		$(this).parents('.select-imitate').find('.select-imitate-popup-body').slideUp('fast'),
		$(this).parents('.select-imitate').find('.select-imitate-popup').css('display','none')
		$(this).parents('.select-imitate').removeClass('opened')			
	})
	
	//тип файл
	$('.file-load').on('click',function(){
		$(this).parents('.file-load-parent').find('.file-load-in').trigger('click')		
	})
	
	$('.file-load-in').on('change',function(){
		$(this).parents('.file-load-parent').find('input.file-load').val($(this).val())		
	})
	
	$('input[type="text"], textarea').focus(function(){
		$(this).addClass('infocus')	
		$(this).parent().addClass('infocus')
	})
	$('input[type="text"], textarea').blur(function(){	
		$(this).removeClass('infocus')
		$(this).parent().removeClass('infocus')
	})
	
})











