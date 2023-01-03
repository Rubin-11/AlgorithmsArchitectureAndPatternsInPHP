<?php

namespace PaymentServices;

use Contracts\PaymentInterface;

class Yandex implements PaymentInterface
{
    public function pay(float $total, string $phone): void
    {
        echo "Принят платеж $total рублей от $phone. Спасибо, что воспользовались сервисами Yandex" . PHP_EOL;
    }
}