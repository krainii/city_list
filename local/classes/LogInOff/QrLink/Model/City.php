<?php

namespace LogInOff\QrLink\Model;


/**
 * Модель города
 *
 * @property int $number
 * @property string $city
 * @property string $region
 * @property string $country
 * @property string $name
 */
class City
{
    private int $iNumber;
    private string $sCity;
    private string $sRegion;
    private string $sCountry;
    private string $sName;

    /**
     * Создаем модель города
     *
     * @param int $iNumber #НОМЕР
     * @throws \InvalidArgumentException
     *  @return void
     */
    public function __construct(int $iNumber) {
        if(empty($iNumber)) {
            throw new \InvalidArgumentException('Неверный аргумент');
        }
        $this->iNumber = $iNumber;
        $this->composeCityValue();
    }

    /**
     * Заполняем поля города, нужно для сохранения в ИБ
     *
     * @return void
     */
    private function composeCityValue() {
        $this->sCity = "Город {$this->iNumber}";
        $this->sRegion = "Регион {$this->iNumber}";
        $this->sCountry = "Страна {$this->iNumber}";
        $this->sName = "Тест материал {$this->iNumber}";
    }

    /**
     * Получаем город
     *
     * @return string
     */
    public function getCity(): string
    {
        return $this->sCity;
    }

    /**
     * Получаем регион
     *
     * @return string
     */
    public function getRegion(): string
    {
        return $this->sRegion;
    }

    /**
     * Получаем страну
     *
     * @return string
     */
    public function getCountry(): string
    {
        return $this->sCountry;
    }

    /**
     * Получаем название
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->sName;
    }
}