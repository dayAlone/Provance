<? $this->setFrameMode(true);?>
<div data-autoplay="true" data-arrows="false" data-width="100%" class="fotorama" data-height="410">
<?foreach ($arResult['ITEMS'] as $key=>$item):
  if($key%6 == 0):
    if($key != 0) echo "</div>";
    ?><div class="persons center"><?
  endif;
	?>
  <div class="person">
    <div class="person__image">
      <div class="person__image-elm" style="background-image: url(<?=$item['PREVIEW_PICTURE']['SRC']?>)"></div>
      <img src="/layout/images/frame-small.png">
    </div>
    <span class="person__name"><?=$item['NAME']?></span>
      <span class="person__info"><?=$item['PROPERTIES']['INFO']['VALUE']?></span>
      <?if($item['PROPERTIES']['EMAIL']['VALUE']):?>
      <a href="mailto:<?=$item['PROPERTIES']['EMAIL']['VALUE']?>" class="person__email"><?=$item['PROPERTIES']['EMAIL']['VALUE']?></a>
      <?endif;?>
    </div>
<?endforeach;?>
</div>
</div>