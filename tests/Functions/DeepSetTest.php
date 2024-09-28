<?php

/** @noinspection PhpPluralMixedCanBeReplacedWithArrayInspection */

declare(strict_types=1);

namespace ModernBx\CommonFunctions\Tests\Functions;

use PHPUnit\Framework\TestCase;

use function ModernBx\CommonFunctions\deep_set;

class DeepSetTest extends TestCase
{
    /**
     * @return array<mixed>
     */
    public function caseProviderArrays(): array
    {
        return [
            [
                [
                    'assets' => [
                        'version' => '1',
                    ],
                ],
                [
                    'assets' => [
                        'version' => '2',
                    ],
                ],
            ],
        ];
    }

    /**
     * @dataProvider caseProviderArrays
     * @param array<mixed> $array
     * @param array<mixed> $afterSetArr
     */
    public function testImmutable(array $array, array $afterSetArr): void
    {
        $resultString = deep_set($array, 'assets.version', '2', true);
        $this->assertSame($afterSetArr, $resultString);

        $resultArray = deep_set($array, ['assets', 'version'], '2', true);
        $this->assertSame($afterSetArr, $resultArray);
    }

    /**
     * @dataProvider caseProviderArrays
     * @param array<mixed> $array
     * @param array<mixed> $afterSetArr
     */
    public function testNotImmutable(array $array, array $afterSetArr): void
    {
        deep_set($array, 'assets.version', '2');
        $this->assertSame($afterSetArr, $array);

        deep_set($array, ['assets', 'version'], '2');
        $this->assertSame($afterSetArr, $array);
    }
}
