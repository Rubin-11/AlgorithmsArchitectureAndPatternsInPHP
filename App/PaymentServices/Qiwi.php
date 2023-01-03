<?php

namespace PaymentServices;

use Contracts\PaymentInterface;

class Qiwi implements PaymentInterface
{
    public function pay(float $total, string $phone): void
    {
        echo "Принят платеж $total рублей от $phone. Платежная система Qiwi" . PHP_EOL;
    }
}