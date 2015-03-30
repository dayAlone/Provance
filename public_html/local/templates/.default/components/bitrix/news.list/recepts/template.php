<? $this->setFrameMode(true);?>
<?
foreach ($arResult['ITEMS'] as $key=>$item):
	if(intval($item['PROPERTIES']['FILE']['VALUE'])>0)
		$file = CFile::GetPath($item['PROPERTIES']['FILE']['VALUE']);
	?>
	<div class="recepts__item">
		<div class="row">
			<div class="col-xs-4 col-xs-offset-1">
				<a href="<?=$file?>" target="_blank" style="background-image: url(<?=$item['PREVIEW_PICTURE']['SRC']?>)" class="recepts__image"></a>
			</div>
			<div class="col-xs-7">
				<a href="<?=$file?>" target="_blank" class="recepts__title"><?=$item['NAME']?></a>
			  	<div class="recepts__text"><?=$item['~PREVIEW_TEXT']?></div>
			</div>
		</div>
	</div>
	<?
endforeach;?>
