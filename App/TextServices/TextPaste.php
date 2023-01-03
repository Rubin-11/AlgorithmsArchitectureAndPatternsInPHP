<?php

namespace TextServices;

class TextPaste extends TextService
{
    protected string $insertedText;

    public function execute(): bool
    {
        if (empty($this->editor->clipboard))
        {
            return false;
        }
            ($this->backup)??$this->saveBackup();
        $this->insertedText = $this->editor->clipboard;
        $this->pasteInnerTextToFile($this->insertedText);
        return true;
    }

    public function undo()
    {
        $this->deleteSelectedTextFromFileByLengthText($this->insertedText);
    }
}