<?php

function union(array $l, array $m) : array
{
    $nSet = [];
    $pSet = [];

    // Set the first Array $l to the nSet as key, value(number of elements)
    foreach ($l as $lItem) {
        if (array_key_exists($lItem, $nSet)) {
            $nSet[$lItem] = $nSet[$lItem] + 1;
        } else {
            $nSet[$lItem] = 1;
        }
    }
    //Set a new Array($pSet)  which is same element between  $l and $m
    foreach ($m as $mItem) {
        if (array_key_exists($mItem, $nSet)) {
            array_push($pSet, $mItem);
            $nSet[$mItem] = $nSet[$mItem] - 1;
        } else {
            array_push($pSet, $mItem);
        }
    }
    //rest of elements will be pushed to $pSet
    foreach ($nSet as $key => $value) {
        if ($value > 0) {
            for ($i = 0; $i < $value; $i++) {
                array_push($pSet, $key);
            }
        }
    }
    //sorting
    for ($j = 0; $j < count($pSet); $j++) {
        for ($k = $j + 1; $k < count($pSet); $k++) {
            if ($pSet[$j] > $pSet[$k]) {
                $p = $pSet[$j];
                $pSet[$j] = $pSet[$k];
                $pSet[$k] = $p;
            }
        }
    }

    return $pSet;
}

$result = union([3, 2, 1,1], [4, 1, 6, 5,1, 1]);

foreach ($result as $item) {
    echo $item . "  ";
}


echo "\n";

