<?php

namespace TextServices;

use Models\File;

abstract class TextService
{
    protected  EditorService $editor;
    public File $file;
    protected  string $backup;


    public function __construct(EditorService $editor)
    {
        $this->editor = $editor;
        $this->file = $editor->file;
    }

    protected function saveBackup(){
        $this->backup = $this->editor->getAllText();
    }
    protected function selectedTextToClipboard() : string
    {
        return $this->editor->clipboard = substr($this->file->content,
            $this->file->textField->start,
            $this->file->textField->getLength());
    }

    protected function deleteSelectedTextFromFileByLengthText(string $text) : string
    {
        return $this->file->content = substr_replace(
            $this->file->content,
            '',
            $this->file->textField->start,
            strlen($text)
        );
    }

    protected function pasteInnerTextToFile(string $text) : string {
        return $this->file->content = substr_replace(
            $this->file->content,
            $text,
            $this->file->textField->start,
            0);
    }

    abstract public function undo();
    abstract public function execute();

}