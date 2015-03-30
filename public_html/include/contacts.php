<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-xs-2">
        <div class="logo"><?=svg('logo')?>
        </div>
      </div>
      <div class="col-xs-9 info center"><a href="#">La chocolaterie</a><span>Tél. : <?=COption::GetOptionString("grain.customsettings","phone") ?></span><span>Fax : <?=COption::GetOptionString("grain.customsettings","fax") ?></span><a href="mailto:<?=COption::GetOptionString("grain.customsettings","email") ?>"><?=COption::GetOptionString("grain.customsettings","email") ?></a></div>
      <div class="col-xs-1 right">
        <nobr>
        	<a href="#"><?=svg('fb')?></a>
        	<a href="#"><?=svg('insta')?></a>
        </nobr>
      </div>
    </div>
  </div>
</div>