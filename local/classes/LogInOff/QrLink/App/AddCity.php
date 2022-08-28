<?php

namespace LogInOff\QrLink\App;
\Bitrix\Main\Loader::includeModule('iblock');

use LogInOff\QrLink\Model\City;
use LogInOff\QrLink\Model\Notice;

/**
 *  Класс для сохранения города (City $city) в ИБ
 *
 * @property int $iIblockId
 */
class AddCity
{
    private int $iIblockId;

    /**
     * Создаем объект. И делаем проверки на наличие такого ИБ
     *
     * @param int $iIblockId
     * @throws \Exception
     */
    public function __construct(int $iIblockId) {
        if(empty($iIblockId)) {
            throw new \InvalidArgumentException('Неправильный аргумент');
        }
        if(!$this->checkIblock($iIblockId)) {
            throw new \Exception("Инфоблок с таким id({$iIblockId}) отсутcвует");
        }
        $this->iIblockId = $iIblockId;
    }


    /**
     * Проверяем если такой инфоблок
     *
     * @param int $iIblockId
     * @return bool
     */
    private function checkIblock(int $iIblockId): bool
    {
        $oIblock = \CIBlock::GetByID($iIblockId);
        if($oIblock->GetNext()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Преобразуем данные в формат нужный битриксу
     *
     * @param City $city
     * @return array
     */
    private function composeSaveValues(City $city): array
    {
        return [
            'IBLOCK_ID' => $this->iIblockId,
            'NAME' => $city->getName(),
            'CODE'=> \CUtil::translit($city->getName(), "ru"),
            'PROPERTY_VALUES' => [
                'CITY' => [
                    $city->getCity(),
                    $city->getRegion(),
                    $city->getCountry(),
                ]
            ]
        ];
    }

    /**
     * Сохранения города в ИБ
     *
     * @param City $city
     * @return Notice
     */
    public function saveCity(City $city): Notice
    {
        $oCIBlockElement = new \CIBlockElement;
        if($iElementId = $oCIBlockElement->Add($this->composeSaveValues($city))) {
            return new Notice('success', "id = {$iElementId}");
        } else {
            return new Notice('error', "Ошибка: {$oCIBlockElement->LAST_ERROR}");
        }
    }

}