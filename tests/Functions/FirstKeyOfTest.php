<?php

/** @noinspection PhpPluralMixedCanBeReplacedWithArrayInspection */

namespace ModernBx\CommonFunctions\Tests\Functions;

use PHPUnit\Framework\TestCase;
use function ModernBx\CommonFunctions\first_key_of;

class FirstKeyOfTest extends TestCase
{
    /**
     * @return array<mixed>
     */
    public function caseProviderValidValue(): array
    {
        return [
            [[], null, []],
            [[
                "data-foo" => 1,
            ], "data-foo", []],
        ];
    }

    /**
     * @dataProvider caseProviderValidValue
     * @param array<mixed> $input
     * @param mixed $expected
     */
    public function testValidOptions(array $input, mixed $expected): void
    {
        $this->assertSame(first_key_of($input), $expected);
    }
}
