<? $this->setFrameMode(true);?>
<div class="industies">
  <div class="industies__nav">
  <?foreach ($arResult['ITEMS'] as $key=>$item):?>
    <a href="#ind-<?=$key?>" data-id="<?=$key?>"><?=$item['NAME']?></a>
  <?endforeach;?>
  </div>
  <div data-width="600" data-height="350" data-nav="false" data-loop="true" data-arrows="always" class="industies__slider">
    <?foreach ($arResult['ITEMS'] as $key=>$item):?>
      <div id="ind-<?=$key?>" style="background-image: url(<?=$item['PREVIEW_PICTURE']['SRC']?>)" class="industies__item">
        <div class="industies__title"><?=$item['NAME']?></div>
        <?if($item['PREVIEW_TEXT']):?>
          <div class="industies__text"><?=$item['~PREVIEW_TEXT']?></div>
        <?endif;?>
      </div>
    <?endforeach;?>
  </div>
</div>
