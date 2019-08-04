<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?echo $arResult["DETAIL_TEXT"];?>
<?
if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
{
	?>
	<div class="news-detail-share">
		<noindex>
		<?
		$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
				"HANDLERS" => $arParams["SHARE_HANDLERS"],
				"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
				"PAGE_TITLE" => $arResult["~NAME"],
				"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
				"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
				"HIDE" => $arParams["SHARE_HIDE"],
			),
			$component,
			array("HIDE_ICONS" => "Y")
		);
		?>
		</noindex>
	</div>
	<?
}
?>
<?if ($arResult["DISPLAY_PROPERTIES"]["VIDEO"]){?>
	<br/><br/>
	<h3>Видео</h3>
    <video controls="" width="620" height="350"><source src="<?=$arResult["DISPLAY_PROPERTIES"]["VIDEO"]["FILE_VALUE"]["SRC"]?>" type="video/mp4"></video>
    <?/*
	<div id="videoplayer" style="height:350px;"></div>
	<script type="text/javascript">
		var flashvars = {
			"comment":"name",
			"st":"/player/styles.txt",
			"file":"<?=$arResult["DISPLAY_PROPERTIES"]["VIDEO"]["FILE_VALUE"]["SRC"]?>",
			"auto":"play"
		};
		var params = {
			wmode:"transparent", 
			allowFullScreen:"true", 
			allowScriptAccess:"always",
			id:"videoplayer"
		}; 
		new swfobject.embedSWF(
			"/player/uppod.swf",
			"videoplayer",
			"620",
			"350",
			"9.0.115.0",
			false,
			flashvars,
			params
		);
	</script>	
	<noscript>		
		<object width="620" height="350">
			<param name="allowFullScreen" value="true" />
			<param name="allowScriptAccess" value="always" />
			<param name="wmode" value="transparent" />
			<param name="movie" value="/player/uppod.swf" />
			<param name="flashvars" value="st=/player/styles.txt&amp;file=<?=$arResult["DISPLAY_PROPERTIES"]["VIDEO"]["FILE_VALUE"]["SRC"]?>" />
			<embed src="/player/uppod.swf" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="transparent" flashvars="st=/player/styles.txt&amp;file=<?=$arResult["DISPLAY_PROPERTIES"]["VIDEO"]["FILE_VALUE"]["SRC"]?>" width="620" height="350"></embed>
		</object>
	</noscript>
    */?>
	<br/>
<?}?>
<?if ($arResult["DISPLAY_PROPERTIES"]["PHOTO"]){?>
	<div class="gallery gallery-det-team">
	<h3>Фотогалерея команды</h3>
	<?
	$arResult["PROPERTIES"]["PHOTO"]["VALUE"] = is_array($arResult["PROPERTIES"]["PHOTO"]["VALUE"]) ? $arResult["PROPERTIES"]["PHOTO"]["VALUE"] : array($arResult["PROPERTIES"]["PHOTO"]["VALUE"]);
	$i = 0;
	foreach($arResult["PROPERTIES"]["PHOTO"]["VALUE"] as $idPhoto){$i++;?>
	<div class="item<?if ($i == 1){?> first<?}?>">
	<?
		$rsFile = CFile::GetByID($idPhoto);
		$arFile = $rsFile->Fetch();
		$arrImages = $arFile;	
		$fileBig = CFile::ResizeImageGet($idPhoto, array('width'=>1200, 'height'=>1200), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
		$file = CFile::ResizeImageGet($idPhoto, array('width'=>220, 'height'=>150), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
		echo '<a href="'.$fileBig["src"].'" rel="prettyPhoto[gallery]" title="'.$arrImages["DESCRIPTION"].'"><img src="'.$file['src'].'" width="'.$file['width'].'" height="'.$file['height'].'" /></a>';
		if (!empty($arrImages["DESCRIPTION"]))
			echo '<span>'.$arrImages["DESCRIPTION"].'</span>';
	?>
	</div>
	<?
		if ($i == 4) {echo '<div class="clear"></div>'; $i = 0;}
	}
	if ($i < 4) {echo '<div class="clear"></div>';}
	?>
	</div>
<?}?>
<?if ($arResult["DISPLAY_PROPERTIES"]["LOGO"]){?>
	<br/>
	<h3>Сайт команды</h3>
	<a href="<?=$arResult["DISPLAY_PROPERTIES"]["LOGO"]["DESCRIPTION"]?>" target="_blank"><img src="<?=$arResult["DISPLAY_PROPERTIES"]["LOGO"]["FILE_VALUE"]["SRC"]?>" /></a>
<?}?>
<?if ($arResult["DISPLAY_PROPERTIES"]["SITE"]){?>
	<br/>
	<h3>Сайт команды</h3>
	<a class="logo-team" href="<?=$arResult["PROPERTIES"]["SITE"]["VALUE"]?>" target="_blank"><div><?=$arResult["PROPERTIES"]["SITE"]["DESCRIPTION"]?></div></a>
<?}?>