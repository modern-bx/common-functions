<?php

/** @noinspection PhpPluralMixedCanBeReplacedWithArrayInspection */

namespace ModernBx\CommonFunctions\Tests\Functions;

use PHPUnit\Framework\TestCase;

use function ModernBx\CommonFunctions\data_attrs;

class DataAttrsTest extends TestCase
{
    /**
     * @return array<mixed>
     */
    public function caseProviderValidValue(): array
    {
        return [
            [[], "", []],
            [[
                "foo" => "1",
                "bar" => "derp",
            ], 'data-foo="1" data-bar="derp"', []],
            [[
                "foo" => false,
                "bar" => "derp",
            ], 'data-bar="derp"', []],
            [[
                "foo" => null,
                "bar" => "derp",
            ], 'data-foo="" data-bar="derp"', []],
        ];
    }

    /**
     * @dataProvider caseProviderValidValue
     * @param array<string, string|int|false|null> $input
     * @param string $expected
     */
    public function testValidOptions(array $input, string $expected): void
    {
        $this->assertSame(data_attrs($input), $expected);
    }
}
