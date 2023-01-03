<?php

namespace TextServices;

use Models\File;

class EditorService
{
    private TextHistory $history;
    public File $file;
    public  string $clipboard ='';

    public function __construct(File $file)
    {
        $this->file = $file;
        $this->history = new TextHistory();
    }

    public function copy(){
        $this->executeCommand(new TextCopy($this));
    }

    public function cut(){
        $this->executeCommand(new TextCut($this));
    }
    public function paste()
    {
        $this->executeCommand(new TextPaste($this));
    }

    public function executeCommand(TextService $command){
        if ($command->execute()){
            $this->history->push($command);
        }
    }
    public function undo(){
        $lastCommand = $this->history->pop();
        if (isset($lastCommand)){
            $lastCommand->undo();
        }else {
            echo 'Nothing to undo';
        }
    }

    public function setClipboard(string $text){
        $this->clipboard = $text;
    }

    public function getAllText(): string
    {
        return $this->file->getText();

    }

    public function getSelectedText(int $start, int $end) : void
    {
        $this->file->getSelectedText($start, $end);
    }

    public function setCarriage(int $pos){
        $this->file->textField->setCarriage($pos);
    }

}