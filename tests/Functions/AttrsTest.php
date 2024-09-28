<?php

/** @noinspection PhpPluralMixedCanBeReplacedWithArrayInspection */

namespace ModernBx\CommonFunctions\Tests\Functions;

use PHPUnit\Framework\TestCase;

use function ModernBx\CommonFunctions\attrs;
use function ModernBx\CommonFunctions\format;

class AttrsTest extends TestCase
{
    /**
     * @return array<mixed>
     */
    public function caseProviderValidValue(): array
    {
        return [
            [[], "", []],
            [[
                "data-foo" => 1,
                "bar" => "derp",
            ], 'data-foo="1" bar="derp"', []],
            [[
                "data-foo" => false,
                "bar" => "derp",
            ], 'bar="derp"', []],
            [[
                "data-foo" => null,
                "bar" => "derp",
            ], 'data-foo="" bar="derp"', []],
            [[
                "data-foo" => 1,
                "bar" => "derp",
            ], "data-foo='1' bar='derp'", [function ($key, $value) {
                return format("{key}='{value}'", [
                    "key" => $key,
                    "value" => $value,
                ]);
            }]],
        ];
    }

    /**
     * @dataProvider caseProviderValidValue
     * @param array<string, string|false> $input
     * @param string $expected
     * @param array<(callable(): mixed)|string> $args
     */
    public function testValidOptions(array $input, string $expected, array $args): void
    {
        $this->assertSame(attrs($input, $args[0] ?? ATTR_PATTERN_STD), $expected);
    }
}
