<?php

function Includes(array $n, array $m) : bool
{
    $nSet = [];
    foreach ($n as $nItem) {
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

    return true;  // 1
}

$result = Includes(["a", "b", "d"], ["a", "b", "b"]);

echo $result ? " Yes \n" : "\n no \n";
