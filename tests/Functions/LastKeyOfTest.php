<?php

/** @noinspection PhpPluralMixedCanBeReplacedWithArrayInspection */

namespace ModernBx\CommonFunctions\Tests\Functions;

use PHPUnit\Framework\TestCase;

class LastKeyOfTest extends TestCase
{
    /**
     * @return array<mixed>
     */
    public function caseProviderValidValue(): array
    {
        return [
            [[], null],
            [[
                "data-foo" => 1,
                "data-derp" => 2,
            ], "data-derp"],
        ];
    }

    /**
     * @dataProvider caseProviderValidValue
     * @param array<mixed> $input
     * @param mixed $expected
     */
    public function testValidOptions(array $input, mixed $expected): void
    {
        $this->assertSame(\last_key_of($input), $expected);
    }
}
