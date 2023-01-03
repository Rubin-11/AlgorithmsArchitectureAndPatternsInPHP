<?php

use Models\Order;
use PaymentServices\Qiwi;
use PaymentServices\WebMoney;
use PaymentServices\Yandex;
use Services\PaymentService;

spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
});

$order1 = new Order(1200, '676-43-23');
$order2 = new Order(124.53, '234-12-56');
$order3 = new Order(12433.00, '234-12-56');

$service = new PaymentService(new Qiwi());
$service->makePayment($order1);
$service->setPaymentMethod(new Yandex())->makePayment($order2);
$service->setPaymentMethod(new WebMoney())->makePayment($order3);