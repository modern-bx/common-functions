<?php

namespace ModernBx\CommonFunctions\Tests\Functions;

use PHPUnit\Framework\TestCase;

use function ModernBx\CommonFunctions\classlist;

class ClasslistTest extends TestCase
{
    public function testClasslist(): void
    {
        $map = [
            "b-user",
            "b-user--logged" => true,
            "b-user--admin" => false
        ];
        $this->assertEquals("b-user b-user--logged", classlist($map));
    }
}
