<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
$APPLICATION->SetPageProperty('nav_class', "nav--white");
$APPLICATION->SetPageProperty('body_class', "index");
$lang = 'fr';
?>
<div class="slider">
  <section data-mods="white" id="home" class="page">
    <div class="container">
    	<?=svg('text')?>
    </div>
    <div class="contacts">
    	<span>Tel : <?=COption::GetOptionString("grain.customsettings","phone") ?></span>
    	<span>Fax : <?=COption::GetOptionString("grain.customsettings","fax") ?></span>
    	<span><a href="mailto:<?=COption::GetOptionString("grain.customsettings","email") ?>"><?=COption::GetOptionString("grain.customsettings","email") ?></a></span>
    </div>
  </section>
  <section data-mods="small, brown" id="about" class="page">
    <div class="container">
      <div class="row">
        <div class="col-xs-5">
          {GALLERY:1}
        </div>
        <div class="col-xs-7 xxl-padding-left">
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
	                "ROOT_MENU_TYPE"     => "about",
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
  <section data-mods="small, gold" id="collection" class="page">
    <div class="container center">
      <?=COption::GetOptionString("grain.customsettings", $lang."_collections_index") ?>
      <?php
          $APPLICATION->IncludeComponent("bitrix:menu", "collections", 
            array(
                "ALLOW_MULTI_SELECT" => "Y",
                "MENU_CACHE_TYPE"    => "A",
                "ROOT_MENU_TYPE"     => "collections",
                "MAX_LEVEL"          => "2",
                "CACHE_NOTES"        => $APPLICATION->GetCurDir()
                ),
            false
          );
        ?>
    </div>
  </section>
  <section data-mods="small, brown" id="store" class="page">
    <div class="container center">
      <?=COption::GetOptionString("grain.customsettings", $lang."_store_index") ?>
      
      <p class="xl-line-height">
        <?=COption::GetOptionString("grain.customsettings","address") ?><br>
        <span class="divider"></span>Tél. : <?=COption::GetOptionString("grain.customsettings","phone") ?><span class="divider"></span><a href="http://www.chocolateriedeprovence.fr">www.chocolateriedeprovence.fr</a> + Liens Facebook/réseaux sociaux<br>
      </p>
    </div>
  </section>
  <section data-mods="small, gold" id="chocolate" class="page">
    <div class="container center">
		<?=COption::GetOptionString("grain.customsettings", $lang."_chokolad_index") ?>
		<p class="xl-margin-top">
			<?php
	          $APPLICATION->IncludeComponent("bitrix:menu", "links", 
	            array(
	                "ALLOW_MULTI_SELECT" => "Y",
	                "MENU_CACHE_TYPE"    => "A",
	                "ROOT_MENU_TYPE"     => "chocolate",
	                "MAX_LEVEL"          => "1",
	                "CACHE_NOTES"        => $APPLICATION->GetCurDir()
	                ),
	            false
	          );
	        ?>
		</p>
    </div>
    <video loop class="video">
      <source src="./layout/video/choko.mp4" type="video/mp4">
      <source src="./layout/video/choko.ogv" type="video/ogg">
      <source src="./layout/video/choko.webm" type="video/webm">
    </video>
  </section>
  <section data-mods="small, brown" id="media" class="page">
    <div class="container">
      <div class="row">
        <div class="col-xs-6">
          <div id="news">
            <h1 class="page__title">News</h1>
            <div class="scroll">
              <div class="scroll__frame">
              	<?
			      $APPLICATION->IncludeComponent("bitrix:news.list", "news", 
			        array(
			          "IBLOCK_ID"      => 2,
			          "NEWS_COUNT"     => "20",
			          "SORT_BY1"       => "ID",
			          "SORT_ORDER1"    => "DESC",
			          "CACHE_TYPE"     => "A",
			          "SET_TITLE"      => "N",
			          "DETAIL_URL"     => "/news/#ELEMENT_CODE#/",
			          "PROPERTY_CODE"  => array('DATE'),
			        ),
			        false
			      );
			    ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-6">
          <div id="media-list">
            <h1 class="page__title">Media</h1>
            <div class="scroll">
              <div class="scroll__frame">
              	<?
      			      $APPLICATION->IncludeComponent("bitrix:news.list", "media", 
      			        array(
      			          "IBLOCK_ID"      => 3,
      			          "NEWS_COUNT"     => "20",
      			          "SORT_BY1"       => "ID",
      			          "SORT_ORDER1"    => "DESC",
      			          "CACHE_TYPE"     => "A",
      			          "SET_TITLE"      => "N",
      			          "PROPERTY_CODE"  => array('FILE'),
      			        ),
      			        false
      			      );
      			    ?>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	<? require($_SERVER['DOCUMENT_ROOT'].'/include/contacts.php') ?>
  </section>
</div>
<div id="Map" tabindex="-1" role="dialog" aria-hidden="true" data-parsley-validate class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"><a data-dismiss="modal" href="#" class="close"><svg width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g id="Page-1" fill="none" fill-rule="evenodd"><g id="Portrait-Retina" transform="translate(-429 -1922)" fill="#532F1B"><path d="M460.978 1924.284l-2.284-2.284-13.705 13.705L431.283 1922l-2.284 2.284 13.705 13.705L429 1951.693l2.284 2.284 13.705-13.705 13.704 13.705 2.284-2.284-13.705-13.705 13.705-13.706" id="close"/></g></g></svg></a>
      <h2 class="modal__title center">Ou trouver nos produits?</h2>
      <div class="row">
        <div class="col-xs-9 col-lg-10">
          <div class="modal__map"></div>
        </div>
        <div class="col-xs-3 col-lg-2">
          <ul class="countries">
            <li><a href="#" class="country">Canada</a></li>
            <li><a href="#" class="country">France</a>
              <ul>
                <li> <a href="#" class="city">Paris </a></li>
                <li> <a href="#" class="city">Nice </a></li>
                <li> <a href="#" class="city">Cannes </a></li>
                <li> <a href="#" class="city">Lyon</a></li>
              </ul>
            </li>
            <li> <a href="#" class="country">Royaume-Uni</a></li>
            <li> <a href="#" class="country">Russie</a>
              <ul>
                <li> <a href="#" class="city">Paris </a></li>
                <li> <a href="#" class="city">Nice </a></li>
                <li> <a href="#" class="city">Cannes </a></li>
                <li> <a href="#" class="city">Lyon</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="Recepts" tabindex="-1" role="dialog" aria-hidden="true" data-parsley-validate class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content"><a data-dismiss="modal" href="#" class="close"><?=svg('close')?></a>
      <h2 class="modal__title center">Recettes gourmandes</h2>
      <div class="scroll l-margin-top">
        <div class="scroll__frame recepts">
        	<?
		      $APPLICATION->IncludeComponent("bitrix:news.list", "recepts", 
		        array(
		          "IBLOCK_ID"      => 5,
		          "NEWS_COUNT"     => "20",
		          "SORT_BY1"       => "SORT",
		          "SORT_ORDER1"    => "ASC",
		          "CACHE_TYPE"     => "A",
		          "SET_TITLE"      => "N",
		          "PROPERTY_CODE"  => array('FILE'),
		        ),
		        false
		      );
		    ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="News" tabindex="-1" role="dialog" aria-hidden="true" data-parsley-validate class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <a data-dismiss="modal" href="#" class="close"><?=svg('close')?></a>
      <div class="news">
        
      </div>
    </div>
  </div>
</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>