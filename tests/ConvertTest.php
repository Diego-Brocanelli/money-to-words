<?php

declare(strict_types=1);

namespace Money\Tests;

use Money\Convert;
use Money\Coins\BRL;
use PHPUnit\Framework\TestCase;
use TypeError;

class ConvertTest extends TestCase
{
    /**
     * @test
     * @dataProvider convertProvider
     */
    public function convert($money, $text)
    {
        $coin      = new BRL();
        $converter = new Convert($coin);
        $result    = $converter->convertNumbersToWords($money);

        $this->assertEquals($text, $result);
    }

    /** @test */
    public function invalidCoin()
    {
        $this->expectException(TypeError::class);

        new Convert('EN');
    }

    public function convertProvider(): array
    {
        $integerValues = include __DIR__ . '/data_provider_integer_values.php';
        $floatValues   = include __DIR__ . '/data_provider_float_values.php';
        $mergedValues  = [...$integerValues, ...$floatValues];

        return $mergedValues;
    }
}
