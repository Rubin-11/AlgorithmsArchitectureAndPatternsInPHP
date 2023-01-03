<?php

namespace TextServices;

class TextCopy extends TextService
{

    public function execute(): bool
    {
        $this->selectedTextToClipboard();

        return false;
    }
    public function undo(){
        //@to do here
    }
}