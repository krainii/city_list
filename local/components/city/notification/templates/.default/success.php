<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->ShowHead();
use Bitrix\Main\Page\Asset;
Asset::getInstance()->addCss(  "/style.css");
?>
    <div class="alert success-alert">
        <h3><?php echo $arResult['message'];?></h3>
    </div>

