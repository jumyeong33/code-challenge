<?php

function Union(array $l, array $m) : array
{
    $MultiSet = [];
    $result = [];

    // keys will be elements, value will be count
    foreach ($l as $lItem) {
        if (array_key_exists($lItem, $MultiSet)) {
            $MultiSet[$lItem] = $MultiSet[$lItem] + 1;
        } else {
            $MultiSet[$lItem] = 1;
        }
    }
    //put $m elements to $result then if $result already had $m elements, do it -1
    foreach ($m as $mItem) {
        $result[] = $mItem;
        if (array_key_exists($mItem, $MultiSet)) {
            $MultiSet[$mItem] = $MultiSet[$mItem] - 1;
        }
    }
    //remaining elements in $multiSet will be pushed in $result which is $value  > 0
    foreach ($MultiSet as $key => $value) {
        if ($value > 0) {
            for ($i = 0; $i < $value; $i++) {
                $result[] = $key;
            }
        }
    }

    sort($result);

    return $result;
}

$result = Union([3, 2, 1, 1], [4, 1, 6, 5, 1, 1]);

foreach ($result as $item) {
    echo $item . "  ";
}
echo "\n";

