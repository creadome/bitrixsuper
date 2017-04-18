<?
	if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
	if (!CModule::IncludeModule('iblock')) return;

	$arResult['CAPTCHA'] = $APPLICATION->CaptchaGetCode();

	if ($post = $_POST['post'])	{
		if (!$APPLICATION->CaptchaCheckCode($post['captcha'], $post['captcha-code'])) $arResult['ERRORS']['captcha'] = 'Неверный код';

		foreach ($post as $name => $value) {
			$value = trim(htmlspecialchars($value));

			if (strlen($value))	{ $arResult['VALUE'][$name] = $value; }
			else {
				switch ($name) {
					case 'name': $arResult['ERRORS']['name'] = 'Не указано имя'; break;
					case 'contact': $arResult['ERRORS']['contact'] = 'Не указана контактная информация'; break;
				}
			}
		}

		if (!$arResult['ERRORS']) {
			$element = new CIBlockElement;

			if ($element = $element->Add(array(
				'IBLOCK_ID' => $arParams['IBLOCK_ID'],
				'IBLOCK_SECTION_ID' => false,

				'NAME' => $arResult['VALUE']['name'],
				'PREVIEW_TEXT' => $arResult['VALUE']['text'],

				'PROPERTY_VALUES' => array(
					'CONTACT' => $arResult['VALUE']['contact']
				)
			))) {
				if ($arParams['EVENT']) CEvent::Send($arParams['EVENT'], SITE_ID, array(
					'NAME' => $arResult['VALUE']['name'],
					'CONTACT' => $arResult['VALUE']['contact'],
					'TEXT' => $arResult['VALUE']['text']
				));

				$arResult['SENT'] = true;
			}
		}
	}
?>