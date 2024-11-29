<?php

declare(strict_types=1);

/*
 * Задача №3
 *
 * Даны веса посылок $boxes и вес, который может увезти курьер $weight.
 * Курьер должен возить по 2 посылки, которые вместе по весу будут строго равны $weight.
 * Необходимо найти максимальное количество рейсов, которые курьер сможет сделать с учетом условий.
 */

// первые входные данные
$boxes = [1, 2, 1, 5, 1, 3, 5, 2, 5, 5];
$weight = 6;

// вторые входные данные
//$boxes = [2,4,3,6,1];
//$weight = 5;

/**
 * @param array $boxes
 * @param int $weight
 * @return int
 */
function getResult(array $boxes, int $weight): int
{
    sort($boxes);

    $leftIndex = 0;
    $rightIndex = count($boxes) - 1;
    $numberOfTrips = 0;

    while ($leftIndex < $rightIndex) {
        $pairWeight = $boxes[$leftIndex] + $boxes[$rightIndex];

        if ($pairWeight === $weight) {
            $numberOfTrips++;
            $leftIndex++;
            $rightIndex--;
        } elseif ($pairWeight < $weight) {
            $leftIndex++;
        } else {
            $rightIndex--;
        }
    }

    return $numberOfTrips;
}

$result = getResult($boxes, $weight);
var_dump($result);

