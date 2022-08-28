<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
if($_GET['apikey'] !== 'RUN2021') {
    $message = 'Неправильный ключ';
    $APPLICATION->IncludeComponent(
        'city:notification',
        '',
        [
            'status' => 'error',
            'message' => $message
        ],
        false
    );
    return;
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
