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
    private int $number;
    private string $city;
    private string $region;
    private string $country;
    private string $name;

    /**
     * Создаем модель города
     *
     * @param int $number #НОМЕР
     * @throws \InvalidArgumentException
     *  @return void
     */
    public function __construct(int $number) {
        if(empty($number)) {
            throw new \InvalidArgumentException('Неверный аргумент');
        }
        $this->number = $number;
        $this->composeCityValue();
    }

    /**
     * Заполняем поля модели города, нужно для сохранения в ИБ
     *
     * @return void
     */
    private function composeCityValue() {
        $this->city = "Город {$this->number}";
        $this->region = "Регион {$this->number}";
        $this->country = "Страна {$this->number}";
        $this->name = "Тест материал {$this->number}";
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}