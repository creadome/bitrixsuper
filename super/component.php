<?
	if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

	if ($this->StartResultCache()) {
		$this->SetResultCacheKeys(array());
		$this->IncludeComponentTemplate();
	}
?>