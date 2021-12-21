<?php

function Includes(array $l, array $m) : bool
{
    $nSet = [];
    foreach ($l as $nItem) {
        if (array_key_exists($nItem, $nSet)) {
            $nSet[$nItem] = $nSet[$nItem] + 1;
        } else {
            $nSet[$nItem] = 1;
        }
    }

    foreach ($m as $mItem) {
        if (!array_key_exists($mItem, $nSet)) {
            return false;
        }

        $nSet[$mItem] = $nSet[$mItem] - 1;

        if ($nSet[$mItem] === -1) {
            return false;
        }
    }

    return true;
}

function Intersection(array $l, array $m) : array
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
            if ($multiSet[$mItem] >= 0) {
                $result[] = $mItem;
            }
        }
    }
    sort($result);

    return $result;
}

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
