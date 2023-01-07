<?php

const COUNT = 1000;
const MIN_RAND = 1;
const MAX_RAND = 10;

function _randArray($count = COUNT, $minRand = MIN_RAND, $maxRand = MAX_RAND)
{
    $myArray = [];
    for ($i = 0; $i < $count; $i++) {
        $num = rand($minRand, $maxRand);
        $myArray[] = $num;
    }
    return $myArray;
}