<?php

namespace App\Model;

class User
{
    public string $name;
    public string $email;
    public ?string $phone;

    public function __construct($name, $email, $phone = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }
}