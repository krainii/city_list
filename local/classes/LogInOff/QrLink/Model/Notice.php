<?php

namespace LogInOff\QrLink\Model;

class Notice
{
    private string $sStatus;
    private string $sMessage;
    private array $arStatusList = [
        'success',
        'notice',
        'error'
    ];
    public function __construct(string $sStatus, string $sMessage) {
        if(empty($sStatus) || empty($sMessage)) {
            throw new \InvalidArgumentException("Неправильные параметры: {$sStatus} и {$sMessage}");
        }
        if (!in_array($sStatus, $this->arStatusList, true)) {
            throw new \InvalidArgumentException("Неизвестный статус {$sStatus}");
        }
        $this->sStatus = $sStatus;
        $this->sMessage = $sMessage;
    }

    /**
     * Получаем статус
     *
     * @return string
     */
    public function getStatus(): string {
        return $this->sStatus;
    }

    /**
     * Получаем сообщение
     *
     * @return string
     */
    public function getMessage(): string  {
        return $this->sMessage;
    }
}