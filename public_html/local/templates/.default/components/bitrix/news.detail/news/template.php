<?
$item = $arResult;
$s = end($arResult['SECTION']['PATH']);
?>
<h2 class="modal__title"><?=$item['PROPERTIES']['DATE']['VALUE']?></h2>
<h4 class="modal__sub-title"><?=$item['NAME']?></h4>
<? if(count($arResult["PROPS"]['IMAGES']) > 0): ?>
<div class="carousel">
	<?foreach ($arResult["PROPS"]['IMAGES'] as $img) { ?>
		<img src="<?=$img['value']?>" alt="">
	<? } ?>
</div>
<? endif; ?>
<div class="center">
	<p><?=$item["PREVIEW_TEXT"]?></p>
</div>
