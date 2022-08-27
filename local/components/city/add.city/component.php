<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult = $arParams;
$result = [];
for ($i = 1; $i <= $arParams['step']; $i++) {
    $id = rand(1, 10000);
    $message = 'id = '. $id . ', Тест материал #' . $i;
    $result['status'] = 'success';
    $result['message'] = $message;
    $arResult['addCity'][] = $result;
}

$this->IncludeComponentTemplate();
