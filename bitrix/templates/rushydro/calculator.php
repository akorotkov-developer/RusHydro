<script type="text/javascript">
	$(document).ready(function(){
		$("#calc-shares").click(function(){
			val_res = parseInt($.trim($("#calc-shares_val").val().replace(/ /g,"")));
			if (!isNaN(val_res)){
				result = Math.floor(val_res)*(110000000000/317637520094);
				if (val_res >= 1 && val_res <= 3)
					$("#calc-shares_res").html("1");
				else
					$("#calc-shares_res").html(Math.floor(result));
			}
		});
	});
</script>
<h3 style="margin-top:-10px">Калькулятор для расчета максимального целого количества дополнительных акций ОАО «РусГидро», которое может приобрести лицо в порядке осуществления им преимущественного права приобретения дополнительных акций ОАО «РусГидро»</h3>
<h3 style="margin-bottom:10px;">Уважаемые акционеры!</h3>
<div class="note">
	Обратите Ваше внимание, что калькулятор осуществляет округление максимального количества акций в меньшую сторону и не учитывает образование дробных акций, которые Вы также можете приобрести.
Действующее законодательство России допускает приобретение Вами дробных акций в процессе реализации преимущественного права, однако, дробная акция, как правило, существенным образом не влияет на количество принадлежащих Вам голосов на Общем собрании акционеров, существенным образом не увеличивает сумму причитающихся Вам дивидендов (если дивиденды подлежат выплате акционерам), однако, отчуждение дробной акции может потребовать от Вас дополнительных затрат или усилий, обычно не соизмеримых с преимуществами от владения дробной акцией. В связи с этим приобретение целого количества акций может быть для Вас более предпочтительным.
</div>

<br/>
<br/>

<div style="font-size:0.9em; color:#333; text-align:justify; line-height:1.1em;">Количество обыкновенных именных акций Эмитента, принадлежащих лицу, имеющему преимущественное право приобретения размещаемых ценных бумаг, по состоянию на 11 октября 2012 года (дата составления списка лиц, имеющих право на участие на внеочередном Общем собрании акционеров Эмитента, на котором принято решение "Об увеличении уставного капитала Общества")</div>
<div style="width:100px; padding-left:8px; margin:8px 0 20px 0;" class="form_feedback"><div class="inp"><i></i><i class="lft"></i><input type="text" size="30" id="calc-shares_val" class="inputtext" /></div></div>

<div style="font-size:0.9em; color:#333; text-align:justify; line-height:1.1em;">Максимальное количество Акций, которое может приобрести лицо, имеющее преимущественное право приобретения размещаемых Акций</div>
<div style="width:100px; padding-left:8px; margin:8px 0 20px 0;" class="form_feedback"><div class="inp"><i></i><i class="lft"></i><div id="calc-shares_res" style="padding-top:4px; font-weight:bold; color:#E66A25;"></div></div></div>

<div style="margin-left:0px;" class="btn_sbmt" id="calc-shares"><i></i><span>Рассчитать</span></div>
<div class="clear"></div>
<br/>
<br/>