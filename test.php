<?php

function IncludesNplusM(array $n, array $m) : bool
{
    $nSet = [];
    foreach ($n as $nItem) { // n operations
        if ($nSet[$nItem] === 1) {
            ++$nSet[$nItem];
        } else {
            $nSet[$nItem] = 1;
        }
    }

    foreach ($m as $mitem) { // m operations
        if ($nSet[$mitem] !== null) {
            $dup = --$nSet[$mitem];
            if ($dup < 0) {
                return false;
            }
        } else {
            $exist = $nSet[$mitem] = false;
            if (!$exist) {
                return false;
            }
        }
    }

    return true;  // 1
}

$result = IncludesNplusM(["a", "b", "d"], ["a", "b", ]);

echo $result ? "Yes" : "no";
