<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/news/([\w-_]+)/.*#",
		"RULE" => "&ELEMENT_CODE=\$1&\$2",
		"ID" => "",
		"PATH" => "/news/index.php",
	),
	array(
		"CONDITION" => "#^/collections/([\w-_]+)/.*#",
		"RULE" => "&SECTION_CODE=\$1&\$2",
		"ID" => "",
		"PATH" => "/collections/index.php",
	)
);

?>