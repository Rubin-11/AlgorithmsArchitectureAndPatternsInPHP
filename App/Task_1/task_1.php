<?php

include '08QuickSort.php';
include 'randArray.php';
include 'Heapsort.php';
include 'PigeonholeSort.php';
include 'MergeSort.php';
include 'CombSort.php';
include 'HeapSplSort.php';

function getArr(): array
{
    return _randArray(1000000);
}

$arr = getArr();
$start = microtime(true);
combSort($arr);
echo "Сортировка расческой: ".( microtime(true) - $start).PHP_EOL;

$arr = getArr();
$start = microtime(true);
mergeSort($arr);
echo "Сортировка слиянием: ".( microtime(true) - $start).PHP_EOL;


$arr = getArr();
$start = microtime(true);
heapSort($arr);
echo "Сортировка пирамидальная: ".( microtime(true) - $start).PHP_EOL;


$arr = getArr();
$start = microtime(true);
treeSort($arr);
echo "Сортировка пирамидальная SPL: ".( microtime(true) - $start).PHP_EOL;

$arr = getArr();
$start = microtime(true);
$lastIndex = count($arr) - 1;
quickSort($arr, 0, $lastIndex);
echo "Сортировка быстрая: ".( microtime(true) - $start).PHP_EOL;

$arr = getArr();
$start = microtime(true);
sort($arr);
echo "Сортировка из PHP: ".( microtime(true) - $start).PHP_EOL;

$arr = getArr();
$start = microtime(true);
pigeonholeSort($arr);
echo "Сортировка голубиная: ".( microtime(true) - $start).PHP_EOL;