<?php

namespace PaymentServices;

use Contracts\PaymentInterface;

class WebMoney implements PaymentInterface
{

    public function pay(float $total, string $phone): void
    {
        echo "Принят платеж $total рублей от $phone через WebMoney" . PHP_EOL;
    }
}