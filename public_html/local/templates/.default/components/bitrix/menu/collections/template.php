<? $this->setFrameMode(true);?>
<?if(count($arResult)>0):?>
	<div class="row">
	<?foreach ($arResult as $key=>$item):
		if($key == 0) $text = "right";
		else  $text = "left";
		?>
		<div class="col-xs-6 <?=$text?>">
        	<a href="<?=$item['LINK']?>" class="collection__link xxl-margin-<?=$text?>"><?=$item['TEXT']?></a>
        </div>
	<?endforeach;?>
	</div>
<?endif;?>