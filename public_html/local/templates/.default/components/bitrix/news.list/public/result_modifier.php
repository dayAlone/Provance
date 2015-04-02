<?
	$arResult['SECTIONS'] = array();
	foreach ($arResult['ITEMS'] as $key=>$item):
		if(!isset($arResult['SECTIONS'][$item['IBLOCK_SECTION_ID']]))
			$arResult['SECTIONS'][$item['IBLOCK_SECTION_ID']] = array('ELEMENTS' => array());
		$arResult['SECTIONS'][$item['IBLOCK_SECTION_ID']]['ELEMENTS'][] = $item;
	endforeach;
	
	$arFilter = array('IBLOCK_ID' => $arResult['ID'], 'ID'=>array_keys($arResult['SECTIONS']));
   	$rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'),$arFilter);
   	while ($arSect = $rsSect->Fetch()) {
		$arResult['SECTIONS'][$arSect['ID']]['NAME']    = $arSect['NAME'];
		$arResult['SECTIONS'][$arSect['ID']]['CODE']    = $arSect['CODE'];
		$arResult['SECTIONS'][$arSect['ID']]['PICTURE'] = $arSect['PICTURE'];
   	}
?>