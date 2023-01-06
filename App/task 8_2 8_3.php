<?php

//2. Определить сложность следующих алгоритмов:

//поиск элемента массива с известным индексом - O(1)
//дублирование массива через foreach - O(N)
//рекурсивная функция нахождения факториала числа - O(N)

//3. Определить сложность следующих алгоритмов. Сколько произойдет итераций?
$n = 100; $array[]= [];
for ($i = 0; $i < $n; $i++) {
    for ($j = 1; $j < $n; $j *= 2) {
        $array[$i][$j]= true;
    }
}

//При $n=100 будет 700 итераций или O(7N)

$count_i = 0;
$n = 100;
$array[] = [];
for ($i = 0; $i < $n; $i += 2) {
    $count_i++;
    for ($j = $i; $j < $n; $j++) {
        $array[$i][$j]= true;
    }
}
//При $n=100 будет 2550 итераций или O(25N)