<?php

namespace ModernBx\CommonFunctions\Tests\Functions;

use PHPUnit\Framework\TestCase;

class FormatTest extends TestCase
{
    public function testFormatFunction(): void
    {
        $template = "- hello {where}! - general {name}";
        $result = \format($template, [
            'where' => 'there',
            'name' => 'Kenobi'
        ]);
        $this->assertSame("- hello there! - general Kenobi", $result);
    }

    public function testMultipleReplacement(): void
    {
        $template = "hello {who}, i am {who}";
        $result = \format($template, [ 'who' => 'world' ]);
        $this->assertSame("hello world, i am world", $result);
    }

    public function testCyrillic(): void
    {
        $template = "Привет, {ключ}!";
        $result = \format($template, [ 'ключ' => 'мир' ]);
        $this->assertSame("Привет, мир!", $result);
    }
}
