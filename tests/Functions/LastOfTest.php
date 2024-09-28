<?php

/** @noinspection PhpPluralMixedCanBeReplacedWithArrayInspection */

namespace ModernBx\CommonFunctions\Tests\Functions;

use PHPUnit\Framework\TestCase;

use function ModernBx\CommonFunctions\last_of;

class LastOfTest extends TestCase
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
            ], 2],
        ];
    }

    /**
     * @dataProvider caseProviderValidValue
     * @template T
     * @param array<T>|null $input
     * @param T|null $expected
     */
    public function testValidOptions(?array $input, mixed $expected): void
    {
        $this->assertSame(last_of($input), $expected);
    }
}
