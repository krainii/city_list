<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$template = '';
switch ($arParams['status']) {
    case 'success':
        $template = 'success';
        break;
    case 'error':
        $template = 'error';
        break;
}
$arResult['message'] = $arParams['message'];
$this->IncludeComponentTemplate($template);
