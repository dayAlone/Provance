<? $this->setFrameMode(true);?>
<div class="news">
<?foreach ($arResult['ITEMS'] as $key=>$item):
	?>
   <div class="news__item">
    <div class="row">
      <div class="col-xs-5">
      	<a href="#News" data-url="<?=$item['DETAIL_PAGE_URL']?>" data-toggle="modal" style="background-image: url(<?=$item['PREVIEW_PICTURE']['SRC']?>)" class="news__image"></a>
      </div>
      <div class="col-xs-7">
        <div class="news__date"><?=$item['PROPERTIES']['DATE']['VALUE']?></div>
        <a href="#News" data-url="<?=$item['DETAIL_PAGE_URL']?>" data-toggle="modal" class="news__title"><?=$item['NAME']?></a>
      </div>
    </div>
  </div>
<?endforeach;?>
</div>