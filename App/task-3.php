<?php

use TextServices\EditorService;
use Services\WordService;

spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
});

$file = 'Files/Editor.txt';

$application = new WordService();
$applicationEditor = new EditorService($application->openFile($file));
$applicationEditor->getSelectedText(0,3);
echo $applicationEditor->clipboard . PHP_EOL;
$applicationEditor->copy();
$applicationEditor->setCarriage(3);
echo $applicationEditor->clipboard . PHP_EOL;
$applicationEditor->paste();
$applicationEditor->setClipboard('To delete');
$applicationEditor->setCarriage(0);
$applicationEditor->paste();
$applicationEditor->undo();
$applicationEditor->undo();
$applicationEditor->getSelectedText(0,5);
$applicationEditor->cut();
$applicationEditor->undo();
$applicationEditor->setCarriage(0);
$applicationEditor->paste();
$applicationEditor->undo();
echo $applicationEditor->file->content;
$application->saveFile($applicationEditor->file);