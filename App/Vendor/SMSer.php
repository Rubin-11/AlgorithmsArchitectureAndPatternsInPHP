<?php

namespace App\Vendor;

class SMSer
{
    public function send(string $phone): void
    {
        echo 'Отправка SMS на номер: ' . $phone . PHP_EOL;
    }
}