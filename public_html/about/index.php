<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('About');
$APPLICATION->SetPageProperty('nav_class', "nav--brown");
$APPLICATION->SetPageProperty('body_class', "inner about");
$lang = 'fr';
include('./.left.menu.php');
?>
<div class="slider">
  <section id="about-first" class="page">
    <div class="container">
      <div class="row">
        <div class="col-xs-5 col-xs-offset-1">
          {GALLERY:1}
        </div>
        <div class="col-xs-6 xxl-padding-left">
          <div class="scroll">
            <div class="scroll__frame">
              <?=COption::GetOptionString("grain.customsettings", $lang."_about_first") ?>
            </div>
          </div>
          <p>
          	<?php
	          $APPLICATION->IncludeComponent("bitrix:menu", "links", 
	            array(
	                "ALLOW_MULTI_SELECT" => "Y",
	                "MENU_CACHE_TYPE"    => "A",
	                "ROOT_MENU_TYPE"     => "left",
	                "MAX_LEVEL"          => "2",
	                "BR"                 => "true",
	                "CACHE_NOTES"        => $APPLICATION->GetCurDir()
	                ),
	            false
	          );
	        ?>
          </p>
        </div>
      </div>
    </div>
  </section>
  <section id="about-second" class="page">
    <div class="container">
      <div class="row">
        <div class="col-xs-5 col-xs-offset-1"><img src="/layout/images/h-2.png" class="max-width"></div>
        <div class="col-xs-6 xxl-padding-left">
          <h1 class="page__title m-margin-top"><?=$aMenuLinks[0][0]?></h1>
          <div class="scroll">
            <div class="scroll__frame">
              <?=COption::GetOptionString("grain.customsettings", $lang."_about_second") ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="about-third" class="page">
    <div class="container">
      <div class="row">
        <div class="col-xs-5 col-xs-offset-1">
          {GALLERY:8}
        </div>
        <div class="col-xs-6 xxl-padding-left">
          <h1 class="page__title"><?=$aMenuLinks[1][0]?></h1>
          <div class="scroll">
            <div class="scroll__frame">
              <?=COption::GetOptionString("grain.customsettings", $lang."_about_third") ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="about-fourth" class="page">
    <div class="container">
    	<div class="row">
    		<div class="col-xs-6">
    			<?
  			      $APPLICATION->IncludeComponent("bitrix:news.list", "staff", 
  			        array(
  			          "IBLOCK_ID"      => 6,
  			          "NEWS_COUNT"     => "30",
  			          "SORT_BY1"       => "SORT",
  			          "SORT_ORDER1"    => "ASC",
  			          "CACHE_TYPE"     => "A",
  			          "SET_TITLE"      => "N",
  			          "PROPERTY_CODE"  => array('INFO', 'EMAIL'),
  			        ),
  			        false
  			      );
  			    ?>
    		</div>
    		<div class="col-xs-6">
    			<h1 class="page__title left"><?=$aMenuLinks[2][0]?></h1>
    			<?=COption::GetOptionString("grain.customsettings", $lang."_about_fourth") ?>
    		</div>
    	</div>
    </div>
    <? require($_SERVER['DOCUMENT_ROOT'].'/include/contacts.php') ?>
  </section>
</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>