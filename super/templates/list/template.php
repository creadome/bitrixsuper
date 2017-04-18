<?
	if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
	$this->setFrameMode(true);
?>

<?
	foreach ($arResult['ITEMS'] as $arItem) {
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT'));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE'), array('CONFIRM' => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
?>

		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<pre>
				<? print_r($arItem) ?>
			</pre>
		</div>

<?
	}
?>