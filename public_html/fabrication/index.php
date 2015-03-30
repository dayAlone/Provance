<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Processus de fabrication');
$APPLICATION->SetPageProperty('nav_class', "nav--brown");
$APPLICATION->SetPageProperty('body_class', "fabric text inner");
$lang = 'fr';
?>
<div class="page">
  <div class="container center">
    <h1>Processus de fabrication</h1>
    <div class="fabric__block xl-margin-top"><img src="/layout/images/f-1.png" alt="">
      <div class="fabric__text">Fèves de cacao</div>
    </div>
    <div class="row">
      <div class="col-xs-5 right">1. Nettoyage</div>
      <div class="col-xs-2 center">2. Séchage</div>
      <div class="col-xs-5 left">3. Concassage</div>
    </div><br><img src="/layout/images/arrow-down.png"><br>
    <div class="fabric__block"><img src="/layout/images/f-2.png" alt="">
      <div class="fabric__text">Nibs</div>
    </div><br><img src="/layout/images/arrow-down.png"><br>
    <div class="fabric__block xl-margin-top"><img src="/layout/images/f-3.png" alt="">
      <div class="fabric__text">Nibs torréfiées<br> Naturels ou<br> Alcalinisés</div>
    </div>
    <div class="row">
      <div class="col-xs-5 right">1. Broyage</div>
      <div class="col-xs-2 center">2. Raffinage</div>
      <div class="col-xs-5 left">3. Tamisage</div>
    </div>
    <div class="row s-margin-top">
      <div class="col-xs-4 col-xs-offset-1 center">
        <div class="right"><img src="/layout/images/arrow-left.png"><br><br></div>
        <div class="fabric__block"><img src="/layout/images/f-4.png" alt="">
          <div class="fabric__text">Liqueur de cacao<br>Naturelle ou alcalinisée</div>
        </div><br>Pressage
      </div>
      <div class="col-xs-2 center"> </div>
      <div class="col-xs-4 center">
        <div class="left"><img src="/layout/images/arrow-right.png"><br><br></div>
        <div class="fabric__block"><img src="/layout/images/f-5.png" alt="">
          <div class="fabric__text">Liqueur<br>naturelle de cacao</div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-6">
        <div class="row">
          <div class="col-xs-6 left">
            <div class="center"><img src="/layout/images/arrow-left.png" class="xxl-margin-left"><br></div>
            <div class="fabric__block"><img src="/layout/images/f-6.png" alt="">
              <div class="fabric__text">Tourteau</div>
            </div>
            <div class="row">
              <div class="col-xs-8 center">1. Concassage <br>2. Broyage<br><img src="/layout/images/arrow-down.png"><br></div>
            </div>
            <div class="fabric__block"><img src="/layout/images/f-9.png" alt="">
              <div class="fabric__text">Poudre de cacao<br>Naturelle<br>ou alcalinisée</div>
            </div>
            <div class="row">
              <div class="col-xs-8 center xxl-line-height">1. Refroidissement<br>2. Stabilisation <br>
                <nobr>3. Conditionnement</nobr><br>4. Stockage <br><img src="/layout/images/arrow-right.png" class="s-margin-top"><br>
              </div>
            </div>
          </div>
          <div class="col-xs-6 right">
            <div class="center"><img src="/layout/images/arrow-right.png" class="xxl-margin-right"><br></div>
            <div class="fabric__block"><img src="/layout/images/f-7.png" alt="">
              <div class="fabric__text">Beurre de cacao</div>
            </div>
            <div class="row">
              <div class="col-xs-8 center col-xs-offset-3">1. Filtration<br>2. Désodorisation<br><img src="/layout/images/arrow-down.png"><br></div>
            </div>
            <div class="fabric__block"><img src="/layout/images/f-12.png" alt="">
              <div class="fabric__text">Beurre<br>désodorisé</div>
            </div>
            <div class="row">
              <div class="col-xs-8 center col-xs-offset-3">1. Filtration<br>2. Désodorisation<br><img src="/layout/images/arrow-short.png"><br></div>
            </div>
          </div>
        </div>
        <div class="center">
          <div style="margin-top: -30px" class="fabric__block fabric__block--transparent"><img src="/layout/images/f-11.png" alt="">
            <div class="fabric__text">Industrie<br>agroalimentaire </div>
          </div>
        </div>
      </div>
      <div class="col-xs-6">
        <div style="margin-top: -60px" class="xxl-line-height"><br>1. Incorporation <br>2. Mélange<br>3. Broyage<br>4. Conchage<br><img src="/layout/images/arrow-down.png"><br>
          <div class="fabric__block"><img src="/layout/images/f-8.png" alt="">
            <div class="fabric__text">Chocolat liquide</div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 left">
            <div style="margin-top: -30px" class="center"><img src="/layout/images/arrow-left.png" class="l-margin-left"><br></div>
            <div class="center xxl-line-height xl-margin-top">Stockage liquide</div><img src="/layout/images/arrow-long.png" style="margin-left: -170px" class="xl-margin-top">
          </div>
          <div class="col-xs-6 right">
            <div style="margin-top: -30px" class="center"><img src="/layout/images/arrow-right.png" class="l-margin-right"><br></div>
            <div class="row">
              <div class="col-xs-8 center col-xs-offset-3 xxl-line-height"><br>1. Stockage liquide<br>2. Temperage<br>3. Moulage<br><img src="/layout/images/arrow-down.png"><br></div>
            </div>
            <div class="fabric__block"><img src="/layout/images/f-10.png" alt="">
              <div class="fabric__text">Drops<br>Tablettes / tablets</div>
            </div>
            <div class="right xxl-margin-right">Consommateurs</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<? require($_SERVER['DOCUMENT_ROOT'].'/include/contacts.php') ?>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>