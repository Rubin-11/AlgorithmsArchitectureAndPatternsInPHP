<?php

namespace App\Services;

use App\Model\User;
use App\Contracts\UserNotificationInterface;


class EmailNotificationService implements UserNotificationInterface
{
    public function notifyUser(User $user): void
    {
        echo 'Отправка email на ' . $user->email . PHP_EOL;
    }
}