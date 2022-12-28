<?php

use App\Model\User;
use App\Services\EmailNotificationService;
use App\Services\SMSNotificationService;
use App\Vendor\SMSer;

spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
});

$vasya = new User('Вася', 'vasya@email.ru', '+712345679');
$petya = new User('Петя', 'petya@email.ru');

$notificationService = new EmailNotificationService();
$notificationService->notifyUser($vasya);
$notificationService->notifyUser($petya);
echo '__________________________' . PHP_EOL;
$notificationService = new SMSNotificationService(new SMSer(), $notificationService);
$notificationService->notifyUser($vasya);
$notificationService->notifyUser($petya);