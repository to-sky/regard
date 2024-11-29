<?php

declare(strict_types=1);

/*
 * Задача №1
 *
 * Напишите функцию, которая развернёт список.
 * Последний элемент должен стать первым, а первый - последним.
 * $c→next должен содержать $b и так далее...
 */

class test
{
    public $next;
}

$a = new test();
$b = new test();
$c = new test();
$a->next = $b;
$b->next = $c;
$c->next = null;

/**
 * @param test $a
 * @return test|null
 */
function reverse(test $a): ?test
{
    $previousNode = null;
    $currentNode = $a;

    while($currentNode !== null) {
        $nextNode = $currentNode->next;
        $currentNode->next = $previousNode;
        $previousNode = $currentNode;
        $currentNode = $nextNode;
    }

    return $previousNode;
}

$ob1 = reverse($a);
var_dump($ob1);