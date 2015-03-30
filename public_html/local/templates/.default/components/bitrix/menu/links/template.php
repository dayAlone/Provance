<? $this->setFrameMode(true);?>
<?if(count($arResult)>0):?>
	<?foreach ($arResult as $key=>$item):
		?><a href="<?=$item['LINK']?>" <?=$item['PARAMS']['MORE']?> class="nav__item <?=($item['SELECTED']?'nav__item--active':'')?>">
			<?=$item['TEXT']?>
		</a><?=($arParams['BR']=='true'?"<br>":"")?>
	<?endforeach;?>
<?endif;?>