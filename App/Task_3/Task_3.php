<?php

include 'randArray.php';
include 'LinearSearch.php';
include 'BinarySearch.php';
include 'InterpolationSearch.php';

const NUM = 50;

$arr = getSortRandArray();

echo "Линейный поиск".PHP_EOL;
echo linearSearch($arr, NUM).PHP_EOL;

echo "Бинарный поиск".PHP_EOL;
echo binarySearch($arr, NUM).PHP_EOL;

echo "Интерполяционный".PHP_EOL;
echo interpolationSearch($arr, NUM);