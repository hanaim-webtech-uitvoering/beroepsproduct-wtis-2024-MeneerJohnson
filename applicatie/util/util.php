<?php

function getElementsFromArrayWithIndex($array, $index)
{
    $newArray = [];
    foreach ($array as $element) {
        array_push($newArray, $element[$index]);
    }
    return $newArray;
}
