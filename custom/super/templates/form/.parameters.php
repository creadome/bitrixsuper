<?
	if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
	if (!CModule::IncludeModule('iblock')) return;

	$iblocks = CIBlock::GetList(array('SORT' => 'ASC'), array('ACTIVE' => 'Y'));
	while ($iblock = $iblocks->Fetch()) $arIBlocks[$iblock['ID']] = $iblock['NAME'];

	$arTemplateParameters = array(
		'AJAX_MODE' => array(),

		'IBLOCK_ID' => array(
			'TYPE' => 'LIST',
			'NAME' => 'Инфоблок для хранения сообщений',
			'VALUES' => $arIBlocks
		),

		'TITLE' => array(
			'TYPE' => 'STRING',
			'NAME' => 'Заголовок формы'
		),

		'EVENT' => array(
			'TYPE' => 'STRING',
			'NAME' => 'Почтовое событие'
		),

		'PAGE' => array(
			'TYPE' => 'STRING',
			'NAME' => 'Страница',
			'DEFAULT' => '={$_SERVER[\'REQUEST_URI\']}'
		)
	);
?>
