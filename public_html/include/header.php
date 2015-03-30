<!DOCTYPE html>
<html lang='ru'>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <?
  $APPLICATION->SetAdditionalCSS("/layout/css/frontend.css", true);
  $APPLICATION->AddHeadScript('/layout/js/frontend.js');
    
  if($_SERVER['SERVER_NAME'] == 'p.local') $APPLICATION->AddHeadScript('http://127.0.0.1:35729/livereload.js?ext=Safari&extver=2.0.9');
  $APPLICATION->ShowViewContent('header');?>
  <title><?php 
    $rsSites = CSite::GetByID(SITE_ID);
    $arSite  = $rsSites->Fetch();
    if($APPLICATION->GetCurDir() != '/') {
      $APPLICATION->ShowTitle();
      
      echo ' | ' . $arSite['NAME'];
    }
    else echo $arSite['NAME'];
    ?></title>
  <?
    $APPLICATION->ShowHead();
    $APPLICATION->ShowViewContent('header');
  ?>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="<?=$APPLICATION->AddBufferContent("body_class");?>">
  <div id="panel"><?$APPLICATION->ShowPanel();?></div>
  <div class="toolbar">
    <div class="container">
      <div class="row">
        <?php
          $APPLICATION->IncludeComponent("bitrix:menu", "menu", 
            array(
                "ALLOW_MULTI_SELECT" => "Y",
                "MENU_CACHE_TYPE"    => "A",
                "ROOT_MENU_TYPE"     => "top",
                "CHILD_MENU_TYPE"    => "left",
                "MAX_LEVEL"          => "2",
                "CACHE_NOTES"        => $APPLICATION->GetCurDir()
                ),
            false
          );
        ?>
      </div>
    </div>
  </div>
  <?/*
  <div id="enter" class="enter">
    <div class="logo"><?=svg('logo')?></div>
    <div class="panel">
      <a href="#">Français</a>
      <a href="#">English</a>
      <a href="#">Русский</a>
    </div>
    <div class="footer">
      <span>Tel : <?=COption::GetOptionString("grain.customsettings","phone") ?></span>
      <span>Fax : <?=COption::GetOptionString("grain.customsettings","fax") ?></span><span>
      <a href="mailto:<?=COption::GetOptionString("grain.customsettings","email") ?>"><?=COption::GetOptionString("grain.customsettings","email") ?></a></span></div>
    <video autoplay="autoplay" loop class="video">
      <source src="./layout/video/lang.mp4" type="video/mp4">
      <source src="./layout/video/lang.ogv" type="video/ogg">
      <source src="./layout/video/lang.webm" type="video/webm">
    </video>
  </div>
  */?>