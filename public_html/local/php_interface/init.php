<?
function svg($value='')
{
	$path = $_SERVER["DOCUMENT_ROOT"]."/layout/images/svg/".$value.".svg";
	return file_get_contents($path);
}

function body_class()
{
	global $APPLICATION;
	if($APPLICATION->GetPageProperty('body_class')) {
		return $APPLICATION->GetPageProperty('body_class');
	}
}
function nav_class()
{
	global $APPLICATION;
	if($APPLICATION->GetPageProperty('nav_class')) {
		return $APPLICATION->GetPageProperty('nav_class');
	}
}
function r_date($date = '', $showday = true) {

	$date = strtotime($date);

	$treplace = array (
		"Январь"   => "января",
		"Февраль"  => "февраля",
		"Март"     => "марта",
		"Апрель"   => "апреля",
		"Май"      => "мая",
		"Июнь"     => "июня",
		"Июль"     => "июля",
		"Август"   => "августа",
		"Сентябрь" => "сентября",
		"Октябрь"  => "октября",
		"Ноябрь"   => "ноября",
		"Декабрь"  => "декабря",
		"January"   => "января",
		"February"  => "февраля",
		"March"     => "марта",
		"April"   => "апреля",
		"May"      => "мая",
		"June"     => "июня",
		"July"     => "июля",
		"August"   => "августа",
		"September" => "сентября",
		"October"  => "октября",
		"November"   => "ноября",
		"December"  => "декабря",
		"*"        => "",
		"th"       => "",
		"st"       => "",
		"nd"       => "",
		"rd"       => ""
	);
   	return strtr(date('d F Y', $date), $treplace);
}
function IBlockElementsMenu($IBLOCK_ID)
{
	$obCache       = new CPHPCache();
	$cacheLifetime = 86400; 
	$cacheID       = 'IBlockElementsMenu_'.$IBLOCK_ID; 
	$cachePath     = '/'.$cacheID;
	if( $obCache->InitCache($cacheLifetime, $cacheID, $cachePath) )
	{
	   $vars = $obCache->GetVars();
	   return $vars['NAV'];
	}
	elseif( $obCache->StartDataCache()  )
	{
		CModule::IncludeModule("iblock");
		
		$arNav    = array();
		$arSort   = array("NAME" => "DESC");
		$arFilter = array("IBLOCK_ID" => $IBLOCK_ID, 'ACTIVE'=>'Y');
		$rs       = CIBlockElement::GetList($arSort, $arFilter, false, false);
		//$rs->SetUrlTemplates("/catalog/#SECTION_CODE#/#ELEMENT_CODE#.php");
		while ($item = $rs->GetNext()):
			$arNav[] = Array(
				$item['NAME'], 
				$item['DETAIL_PAGE_URL'], 
				Array(), 
				Array(), 
				"" 
			);
		endwhile;
		$obCache->EndDataCache(array('NAV' => $arNav));
		return $arNav;
	}
}

AddEventHandler("main", "OnEndBufferContent", "OnEndBufferContentHandler");
function OnEndBufferContentHandler(&$content)
{
	if(!strstr($_SERVER['SCRIPT_NAME'], 'bitrix/admin')):
	   $pattern = '/{GALLERY:(\d*|\s\d*)}/i';
		if(preg_match_all($pattern, $content, $matches, false, false)):
		   	foreach ($matches[0] as $key => $val):
				ob_start();
			   		global $APPLICATION;
					$APPLICATION->IncludeComponent("bitrix:news.detail","gallery",Array(
						"IBLOCK_ID"     => "1",
						"ELEMENT_ID"    => $matches[1][$key],
						"CHECK_DATES"   => "N",
						"IBLOCK_TYPE"   => "common",
						"SET_TITLE"     => "N",
						"PROPERTY_CODE" => Array("IMAGES", "FRAME"),
						"CACHE_TYPE"    => "A",
					));
			   		$gallery = ob_get_contents();
				ob_end_clean();
			   	$content = str_replace($val, $gallery, $content);
		   	endforeach;
		endif;
	endif;
}
?>