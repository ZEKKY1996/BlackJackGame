<?php

use PHPUnit\Framework\TestCase;

final class MathTest extends TestCase
{
    public function testDouble()
    {
        require_once(__DIR__ . '/../lib/Math.php');
        $this->assertSame(4, double(2));
    }
}
