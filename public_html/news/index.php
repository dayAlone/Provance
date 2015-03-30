<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if(isset($_REQUEST['ELEMENT_CODE'])):
$APPLICATION->IncludeComponent("bitrix:news.detail","news",Array(
	"IBLOCK_ID"     => 2,
	"ELEMENT_CODE"  => $_REQUEST['ELEMENT_CODE'],
	"CHECK_DATES"   => "N",
	"IBLOCK_TYPE"   => "fr_content",
	"SET_TITLE"     => "N",
	"FIELD_CODE"    => array('PREVIEW_TEXT'),
	"PROPERTY_CODE" => Array("IMAGES", "DATE"),
	"CACHE_TYPE"    => "A",
	"CACHE_TIME"    => "3600",
));
else:
	LocalRedirect("/");
endif;
?>