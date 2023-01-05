<?php

namespace Contracts;

interface PaymentInterface
{
    public function pay(float $total, string $phone);
}