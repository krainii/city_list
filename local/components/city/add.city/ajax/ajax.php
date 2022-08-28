<?php
define("NO_KEEP_STATISTIC", true); // Не собираем стату по действиям AJAX
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

use LogInOff\QrLink\Model\City;
use LogInOff\QrLink\Model\Notice;
use LogInOff\QrLink\App\AddCity;

if($_REQUEST) {
    $startTime = microtime(true);
    $arResult = [];
    $iStart = (int) $_REQUEST['first'];
    $iEnd = (int) $_REQUEST['first'] + (int) $_REQUEST['step'];
    $iIblockId = $_REQUEST['iblock'];
    $oAddCity = new \LogInOff\QrLink\App\AddCity($iIblockId);

    for ($i = $iStart; $i < $iEnd; $i++) {
        $arResult[] = $i;
        $cityNumber = (int) $i;
        $oCity = new \LogInOff\QrLink\Model\City($cityNumber);
        $oSave = $oAddCity->saveCity($oCity);
        $APPLICATION->IncludeComponent(
            'city:notification',
            '',
            [
                'status' => $oSave->getStatus(),
                'message' => "{$oSave->getMessage()} {$oCity->getName()}"
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


