<?php

/** @noinspection PhpPluralMixedCanBeReplacedWithArrayInspection */

declare(strict_types=1);

namespace ModernBx\CommonFunctions\Tests\Functions;

use PHPUnit\Framework\TestCase;

use function ModernBx\CommonFunctions\array_exclude_keys;

class ArrayExcludeKeysTest extends TestCase
{
    /**
     * @param array<mixed> $input
     * @param array<mixed> $paths
     * @param array<mixed> $expected
     *
     * @dataProvider arrayProvider
     */
    public function testFunction(array $input, array $paths, array $expected): void
    {
        $this->assertSame(
            $expected,
            array_exclude_keys($input, $paths)
        );
    }

    /**
     * @return array<mixed>
     */
    public function arrayProvider(): array
    {
        return [
            [
                [
                    'NAME' => 'John Smith',
                    'SECRET' => 'DUCK7809BINGO',
                    'PROPERTIES' => [
                        'LOGIN' => 'johny',
                        'PASSWORD' => 'qwerty123',
                    ],
                ],
                [
                    ['PROPERTIES', 'PASSWORD'],
                ],
                [
                    'NAME' => 'John Smith',
                    'SECRET' => 'DUCK7809BINGO',
                    'PROPERTIES' => [
                        'LOGIN' => 'johny',
                    ],
                ],
            ],
            [
                [
                    'NAME' => 'John Smith',
                    'SECRET' => 'DUCK7809BINGO',
                    'PROPERTIES' => [
                        'LOGIN' => 'johny',
                        'PASSWORD' => 'qwerty123',
                    ],
                ],
                [
                    'SECRET',
                ],
                [
                    'NAME' => 'John Smith',
                    'PROPERTIES' => [
                        'LOGIN' => 'johny',
                        'PASSWORD' => 'qwerty123',
                    ],
                ],
            ],
            [
                [
                    'NAME' => 'John Smith',
                    'SECRET' => 'DUCK7809BINGO',
                    'PROPERTIES' => [
                        'LOGIN' => 'johny',
                        'PASSWORD' => 'qwerty123',
                    ],
                ],
                [
                    'HASH',
                ],
                [
                    'NAME' => 'John Smith',
                    'SECRET' => 'DUCK7809BINGO',
                    'PROPERTIES' => [
                        'LOGIN' => 'johny',
                        'PASSWORD' => 'qwerty123',
                    ],
                ],
            ],
        ];
    }
}
