<?
	if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
	if (!CModule::IncludeModule('iblock')) return;

	$iblocks = CIBlock::GetList(array('SORT' => 'ASC'), array('ACTIVE' => 'Y'));
	while ($iblock = $iblocks->Fetch()) $arIBlocks[$iblock['ID']] = $iblock['NAME'];

	$arTemplateParameters = array(
		'IBLOCK_ID' => array(
			'TYPE' => 'LIST',
			'NAME' => 'Инфоблок',
			'VALUES' => $arIBlocks
		),

		'FILTER_NAME' => array(
			'TYPE' => 'STRING',
			'NAME' => 'Фильтр (массив)'
		),

		'SORT_BY' => array(
			'TYPE' => 'LIST',
			'NAME' => 'Поле для сортировки',
			'VALUES' => array('SORT' => 'Сортировка', 'ACTIVE_FROM' => 'Дата начала активности'),
			'DEFAULT' => 'SORT',
			'ADDITIONAL_VALUES' => 'Y'
		),

		'SORT_ORDER' => array(
			'TYPE' => 'LIST',
			'NAME' => 'Направление сортировки',
			'VALUES' => array('ASC' => 'По возрастанию', 'DESC' => 'По убыванию'),
			'DEFAULT' => 'ASC',
			'ADDITIONAL_VALUES' => 'Y'
		),

		'COUNT' => array(
			'TYPE' => 'STRING',
			'NAME' => 'Количество элементов'
		),

		'CACHE_TIME' => array(
			'DEFAULT' => 36000000
		)
	);
?>
