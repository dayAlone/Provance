<div data-autoplay="true" data-arrows="false" data-width="100%" class="fotorama" data-height="320">
	<?foreach ($arResult['PROPERTIES']['IMAGES']['VALUE'] as $key => $img):?>
		<?
		if($arResult['PROPERTIES']['FRAME']['VALUE_XML_ID'] != 'Y'):?>
			<img src="<?=CFile::GetPath($img)?>">
		<?else:
		?>
			<div style="background-image: url(<?=CFile::GetPath($img)?>);" class="cert center">
				
				<a target="_blank" href="<?=($arResult['PROPERTIES']['IMAGES']['DESCRIPTION'][$key]?$arResult['PROPERTIES']['IMAGES']['DESCRIPTION'][$key]:"#")?>">
					<img src="/layout/images/frame-big.png">
				</a>
			</div>
		<?endif;?>
	<?endforeach;?>
</div>