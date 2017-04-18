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

		'EVENT' => array(
			'TYPE' => 'STRING',
			'NAME' => 'Почтовое событие'
		)
	);
?>
