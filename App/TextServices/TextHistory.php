<?php

namespace TextServices;

class TextHistory
{
    private array $history;

    public function push(TextService $command){
        $this->history[] = $command;
    }
    public function pop() : TextService
    {
        return array_pop($this->history);
    }
}