<?php

function Intersection(array $l, array $m) : array
{
    $multiSet = [];
    $result = [];
    //$l = [1,2,2,3,5]
    //$m = [1,2,2,2,5,8]

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
            if ($multiSet[$mItem] >= 0) {
                $result[] = $mItem;
            }
        }
    }
        sort($result);

        return $result;

}

$array = Intersection([3, 5 ,1, 2, 2, 1, 4], [1, 2, 5, 8, 2, 1, 2]);

foreach ($array as $item) {
    echo $item."  ";
}
