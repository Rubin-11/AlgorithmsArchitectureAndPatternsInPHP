<?php

namespace Models;


class Applicant implements \SplObserver
{
    private string $name;
    private string $email;
    private int $experience;

    public function __construct($name, $email, $experience)
    {
        $this->name = $name;
        $this->email = $email;
        $this->experience = $experience;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function update($subject): void
    {
        $name = $this->getName();
        $email = $this->getEmail();
        $vacancy = $subject->getVacancy();
        $message = "Уважаемый $name!" . PHP_EOL .
            "Новая вакансия: $vacancy" . PHP_EOL;
        echo "Будет отправлено на $email." . PHP_EOL;
        echo $message;
    }
}