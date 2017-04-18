<?
	if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

	$set = array(
		'TITLE' => 'Заголовок',
		'TEXT' => 'Текст',
		'LINK' => 'Ссылка',
	);

	foreach ($set as $key => $value) {
		$arTemplateParameters[$key] = array(
			'NAME' => $value,
			'COLS' => 60,
			'ROWS' => 2
		);
	}
?>