<?php

namespace Lib;

class Set
{
    public array $array;


    public static function New(array $array) : Set
    {
        $set = new Set();
        $set->array = $array;

        return $set;
    }

    public function Includes(Set $t) : bool
    {
        return Includes($this->array, $t->array);
    }

    public function Union(Set $t) : Set
    {
        return self::New(Union($this->array, $t->array));
    }

    public function Intersection(Set $t) : Set
    {
        return self::New(Intersection($this->array, $t->array));
    }

    public function Difference(Set $t) : Set
    {
        return self::New(Difference($this->array, $t->array));
    }
}




