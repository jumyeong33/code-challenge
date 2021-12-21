<?php

use Lib\Set;
use PHPUnit\Framework\TestCase;

class SetTest extends TestCase
{
    public function test_Set_Array()
    {
        $set = Set::New([1, 3, 2]);

        $this->assertEquals([1, 3, 2], $set->array);
    }

    public function test_Set_Includes()
    {
        $set = Set::New([1, 3, 2]);
        $result = $set->Includes(Set::New([3, 2]));

        $this->assertTrue($result);
    }

    public function test_Set_Union()
    {
        $set = Set::New([1, 3, 2]);
        $result = $set->Union(Set::New([3, 3, 6]));

        $this->assertEquals(Set::New([1, 2, 3, 3, 6])->array, $result->array);
    }

    public function test_Set_Intersection()
    {
        $set = Set::New([1, 3, 2]);
        $result = $set->Intersection(Set::New([2, 1, 6]));

        $this->assertEquals(Set::New([1, 2])->array, $result->array);
    }

    public function test_Set_Difference()
    {
        $set = Set::New([1, 3, 2]);
        $result = $set->Difference(Set::New([1, 3, 6]));

        $this->assertEquals(Set::New([2])->array, $result->array);
    }
}
