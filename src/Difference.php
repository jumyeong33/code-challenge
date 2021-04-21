<?php

function Difference(array $l, array $m) : array
{
    $multiSet = [];
    $result = [];

    foreach ($l as $lItem) {
        if (array_key_exists($lItem, $multiSet)) {
            $multiSet[$lItem] += 1;
        } else {
            $multiSet[$lItem] = 1;
        }
    }
    foreach ($m as $mItem) {
        if (array_key_exists($mItem, $multiSet)) {
            $multiSet[$mItem] -= 1;
        }
    }
    foreach ($multiSet as $key => $value) {
        if ($value > 0) {
            for ($i = 0; $i < $value; $i++) {
                $result[] = $key;
            }
        }
    }

    sort($result);

    return $result;
}

$array = Difference([1, 2, 3, 4], [1, 4, 5]);

foreach ($array as $item) {
    echo $item . "  ";
}
