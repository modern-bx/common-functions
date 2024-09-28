<?php

/** @noinspection PhpPluralMixedCanBeReplacedWithArrayInspection */

namespace ModernBx\CommonFunctions\Tests\Functions;

use PHPUnit\Framework\TestCase;

use function ModernBx\CommonFunctions\to_json;

class ToJsonTest extends TestCase
{
    /**
     * @return array<mixed>
     */
    public function caseProviderValidValue(): array
    {
        return [
            [1, "1"],
            [true, "true"],
        ];
    }

    /**
     * @return array<mixed>
     */
    public function caseProviderInvalidValue(): array
    {
        return [
            [INF, false],
            [NAN, false],
        ];
    }

    /**
     * @dataProvider caseProviderValidValue
     * @param mixed $input
     * @param string|false $expected
     * @throws \JsonException
     */
    public function testValidOptions(mixed $input, string|false $expected): void
    {
        $this->assertSame(to_json($input), $expected);
    }

    /**
     * @dataProvider caseProviderInvalidValue
     * @param mixed $input
     * @param string|false $expected
     * @throws \JsonException
     */
    public function testInvalidOptions(mixed $input, string|false $expected): void
    {
        $this->expectException(\JsonException::class);

        $this->assertSame(to_json($input), $expected);
    }
}
