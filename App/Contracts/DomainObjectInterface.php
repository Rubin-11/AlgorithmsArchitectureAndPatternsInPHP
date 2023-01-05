<?php

namespace Contracts;


interface PayableInterface
{
    public function getTotalAmount(): float;

    public function getClientPhone(): string;
}