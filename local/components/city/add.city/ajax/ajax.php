<?php
define("NO_KEEP_STATISTIC", true); // Не собираем стату по действиям AJAX
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if($_REQUEST) {
    $startTime = microtime(true);

    $arResult = [];
    $start = $_REQUEST['first'];
    $end = $_REQUEST['first'] +  $_REQUEST['step'];
    for ($i = $start; $i < $end; $i++) {
        $result = [];
        $id = rand(1, 10000);
        $message = 'id = '. $id . ', Тест материал #' . $i;
        $result['status'] = 'success';
        $result['message'] = $message;
        $arResult['addCity'][] = $result;
        $APPLICATION->IncludeComponent(
            'city:notification',
            '',
            [
                'status' => $result['status'],
                'message' => $message
            ],
            false
        );
    }
    $time = microtime(true) - $startTime;
    $APPLICATION->IncludeComponent(
        'city:notification',
        '',
        [
            'status' => 'notice',
            'message' =>'Время выполнения итерации: '. round($time, 4).' сек.'
        ],
        false
    );
}


