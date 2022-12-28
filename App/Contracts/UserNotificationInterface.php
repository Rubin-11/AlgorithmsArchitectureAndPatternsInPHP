<?php

namespace App\Contracts;

use App\Model\User;

interface UserNotificationInterface
{
    public function notifyUser(User $user): void;
}