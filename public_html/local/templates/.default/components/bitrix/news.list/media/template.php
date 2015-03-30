<? $this->setFrameMode(true);?>
<div class="media">
<?foreach ($arResult['ITEMS'] as $key=>$item):
	?>
  <a href="<?=CFile::GetPath($item['PROPERTIES']['FILE']['VALUE'])?>" target="_blank" style="background-image: url(<?=$item['PREVIEW_PICTURE']['SRC']?>)" class="media__item">
    <div class="media__title"><?=$item['NAME']?></div>
  </a>
<?endforeach;?>
</div>