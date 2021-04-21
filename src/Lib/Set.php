<?php


namespace Lib;

class Set
{
    public static function New(int $a, int $b, int $c) : Set
    {
        $set = new Set();
        $set->a = $a;
        $set->b = $b;
        $set->c = $c;
        
        return $set;
    }

    public function include() : bool
    {

    }
}

