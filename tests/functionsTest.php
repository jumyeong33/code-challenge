<?php

use Lib\Set;
use PHPUnit\Framework\TestCase;

class functionsTest extends TestCase
{
    public function test_Includes_True()
    {
        $set = Set::New([1, 3, 2]);

        $trueTests = [
            [3, 2],
            [1, 2],
            [1],
            [2],
            [3],
            [],
            [1, 2, 3],
        ];
        foreach ($trueTests as $trueTest) {
            $result = Includes($set->array, $trueTest);
            $this->assertTrue($result);
        }
    }

    public function test_Includes_False()
    {
        $set = Set::New([1, 3, 2]);

        $falseTests = [
            [1, 1],
            [1, 4],
            [1, 1, 2, 3],
        ];
        foreach ($falseTests as $falseTest) {
            $result = Includes($set->array, $falseTest);
            $this->assertFalse($result);
        }
    }

    public function test_Union_5Cases()
    {
        $set = Set::New([1, 3, 2]);

        $result1 = Union($set->array, [1, 1]);
        $result2 = Union($set->array, [1, 2, 3, 3, 4]);
        $result3 = Union($set->array, [5, 6, 7, 8]);
        $result4 = Union($set->array, [1, 2, 3]);
        $result5 = Union($set->array, []);

        $this->assertEquals(Set::New([1, 1, 2, 3])->array, $result1);
        $this->assertEquals(Set::New([1, 2, 3, 3, 4])->array, $result2);
        $this->assertEquals(Set::New([1, 2, 3, 5, 6, 7, 8])->array, $result3);
        $this->assertEquals(Set::New([1, 2, 3])->array, $result4);
        $this->assertEquals(Set::New([1, 2, 3])->array, $result5);
    }

    public function test_Intersection_5Cases()
    {
        $set = Set::New([1, 3, 2]);
        $set1 = Set::New([1, 1, 1, 3]);

        $result1 = Intersection($set->array, [1]);
        $result2 = Intersection($set->array, [1, 2]);
        $result3 = Intersection($set->array, [1, 1, 2]);
        $result4 = Intersection($set->array, []);
        $result5 = Intersection($set1->array, [1, 1, 5]);

        $this->assertEquals(Set::New([1])->array, $result1);
        $this->assertEquals(Set::New([1, 2])->array, $result2);
        $this->assertEquals(Set::New([1, 2])->array, $result3);
        $this->assertEquals(Set::New([])->array, $result4);
        $this->assertEquals(Set::New([1, 1])->array, $result5);
    }

    public function test_Difference_6Cases()
    {
        $set = Set::New([1, 3, 2]);
        $set1 = Set::New([1, 1, 1, 3, 2]);

        $result1 = Difference($set->array, [1]);
        $result2 = Difference($set->array, [1, 2]);
        $result3 = Difference($set->array, [1, 2, 3]);
        $result4 = Difference($set->array, [4]);
        $result5 = Difference($set->array, []);
        $result6 = Difference($set1->array, [1, 1, 3, 2]);

        $this->assertEquals(Set::New([2, 3])->array, $result1);
        $this->assertEquals(Set::New([3])->array, $result2);
        $this->assertEquals(Set::New([])->array, $result3);
        $this->assertEquals(Set::New([1, 2, 3])->array, $result4);
        $this->assertEquals(Set::New([1, 2, 3])->array, $result5);
        $this->assertEquals(Set::New([1])->array, $result6);
    }
}
