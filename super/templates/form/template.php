<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
	$frame = $this->createFrame()->begin('');

	if ($arResult['ERRORS']) {
?>

	<p><?=implode('<br>', $arResult['ERRORS'])?></p>

<?
	}

	if ($arResult['SENT']) {
?>

	<p>Сообщение отправлено!</p>
<?
	} else {
?>

	<form action="" method="post">
		<p><input type="text" size="60" name="post[name]" value="<?=$arResult['VALUE']['name']?>" placeholder="Имя"<?=$arResult['ERRORS']['name'] ? ' class="error"' : ''?>></p>
		<p><input type="text" size="60" name="post[contact]" value="<?=$arResult['VALUE']['contact']?>" placeholder="Контактная информация"<?=$arResult['ERRORS']['contact'] ? ' class="error"' : ''?>></p>
		<p><textarea name="post[text]" cols="80" rows="5" placeholder="Сообщение"><?=$arResult['VALUE']['text']?></textarea></p>

		<p><label for="captcha"><img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA"]?>"></label><br>
		<input id="captcha" type="text" size="30" name="post[captcha]" placeholder="Символы"></p>

		<input type="hidden" name="post[captcha-code]" value="<?=$arResult['CAPTCHA']?>">
		<button type="submit">Отправить</button>
	</form>

<?
	}
?>