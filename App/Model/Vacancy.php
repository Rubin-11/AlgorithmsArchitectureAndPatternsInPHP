<?php

namespace Models;

use SplObjectStorage;
use SplObserver;

class Vacancy
{
    private string $body;

    private SplObjectStorage $observers;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function subcribe(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function unsubscribe(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function getVacancy(): string
    {
        return $this->body;
    }

    public function addVacancy($body): void
    {
        $this->body = $body;
        $this->notify();
    }
}