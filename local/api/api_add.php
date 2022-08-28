<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

if($_GET['apikey'] !== 'RUN2021') {
    throw new \Exception("Неправильный ключ api {$_GET['apikey']}");
}

$APPLICATION->IncludeComponent(
    'city:add.city',
    '',
    [
        'iblock' => $_GET['IBLOCK'],
        'step' => $_GET['STEP'],
        'count' => $_GET['COUNT']
    ],
    false
);
