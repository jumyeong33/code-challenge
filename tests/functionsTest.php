<?php

use PHPUnit\Framework\TestCase;

class functionsTest extends TestCase
{
    public function test_Includes_simple() : void
    {
        $result = Includes(["a", "b", "d"], ["a", "b", "b"]);
        $this->assertFalse($result);
    }

    public function test_Union_simple() : void
    {
        $result = Union(["a", "b", "d"], ["a", "b", "b"]);

        $this->assertEquals(["a", "b", "b", "d"], $result);
    }

    public function test_Intersection_simple() : void
    {
        $result = Intersection(["a", "b", "d"], ["a", "b", "b"]);
        $this->assertEquals(["a", "b"], $result);
    }

    public function test_Difference_simple() : void
    {
        $result = Difference(["a", "b", "d"], ["a", "b", "b"]);
        $this->assertEquals(["d"], $result);
    }
}
