<?php

//Реализовать удаление элемента массива по его значению. Обратите внимание на возможные дубликаты!
$array = [1, 12, 15, 45, 342, 324, 15, 53246, 34534, 435, 34623, 15];

function filterArrayByValue($array, $value): array
{
    return array_filter($array, static fn($item) => $item !== $value);
}
var_dump(filterArrayByValue($array, 15));