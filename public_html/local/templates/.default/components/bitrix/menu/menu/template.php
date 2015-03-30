<? $this->setFrameMode(true);?>
<?if(count($arResult)>0):?>
<nav class="nav <?=$arParams['CLASS']?> <?=$APPLICATION->AddBufferContent("nav_class");?>">
	<ul>
	<?foreach ($arResult as $key=>$item):
		if($item['ADDITIONAL_LINKS'][$arParams['CACHE_NOTES']])
			$item['LINK'] = $item['ADDITIONAL_LINKS'][$arParams['CACHE_NOTES']];
		?>
		<li>
			<a href="<?=$item['LINK']?>" <?=$item['PARAMS']['MORE']?> class="nav__item <?=($item['SELECTED']?'nav__item--active':'')?>">
				<?if(strlen($item['PARAMS']['SVG'])>0):?>
					<?=svg($item['PARAMS']['SVG'])?>
				<?else:?>
					<?=$item['TEXT']?>
				<?endif;?>
			</a>
		<?if($arResult[$key+1][ 'DEPTH_LEVEL' ] < $item[ 'DEPTH_LEVEL' ]):?>
			</li></ul>
		<?endif;?>
		<?if($arResult[$key+1][ 'DEPTH_LEVEL' ] > $item[ 'DEPTH_LEVEL' ]):?>
			<ul>
		<?else:?>
			</li>
		<?endif;?>

	<?endforeach;?>
	</ul>
</nav>
<?endif;?>