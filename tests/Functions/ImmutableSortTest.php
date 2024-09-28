<?php

/** @noinspection PhpPluralMixedCanBeReplacedWithArrayInspection */

declare(strict_types=1);

namespace ModernBx\CommonFunctions\Tests\Functions;

use PHPUnit\Framework\TestCase;

use function ModernBx\CommonFunctions\immutable_sort;

class ImmutableSortTest extends TestCase
{
    /**
     * @return array<mixed>
     */
    public function caseProviderValidValue(): array
    {
        return [
            [[], [], "sort"],
            [[3, 1, 2], [1, 2, 3], "sort"],
            [[3, 1, 2], [3, 2, 1], "rsort"],
            [[3 => 1, 1 => 2, 2 => 3], [1 => 2, 2 => 3, 3 => 1], "ksort"],
            [[3 => 1, 1 => 2, 2 => 3], [1 => 2, 2 => 3, 3 => 1], "uksort", [function ($a, $b) {
                return $a - $b;
            }]],
        ];
    }

    /**
     * @dataProvider caseProviderValidValue
     * @param array<mixed> $input
     * @param array<mixed> $expected
     * @param callable|null $function
     * @param array<mixed> $rest
     */
    public function testValidOptions(array $input, array $expected, callable|null $function, array $rest = []): void
    {
        $this->assertSame(immutable_sort($input, $function, ...$rest), $expected);
    }
}
