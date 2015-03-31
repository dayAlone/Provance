<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Collections');
$APPLICATION->SetPageProperty('nav_class', "nav--brown");
$APPLICATION->SetPageProperty('body_class', "product inner");
$lang = 'fr';
include('./.left.menu.php');
?>
<div class="page">
  <div class="hidden">
    <div class="arrow">
      <div class="arrow__prev"><?=svg('left')?>
      </div>
      <div class="arrow__next"><?=svg('right')?>
      </div>
    </div>
  </div>
  <?
  $APPLICATION->IncludeComponent("bitrix:news.list", $_REQUEST['SECTION_CODE'], 
    array(
      "IBLOCK_ID"           => 4,
      "NEWS_COUNT"          => "20",
      "SORT_BY1"            => "ID",
      "SORT_ORDER1"         => "DESC",
      "CACHE_TYPE"          => "A",
      "SET_TITLE"           => "N",
      "DETAIL_URL"          => "/news/#ELEMENT_CODE#/",
      "PARENT_SECTION_CODE" => $_REQUEST['SECTION_CODE']
    ),
    false
  );
  ?>
</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>