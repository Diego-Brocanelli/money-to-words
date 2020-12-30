<?php

declare(strict_types=1);

namespace Money\Tests;

use Money\MoneyToWords;
use Money\Coins\BRL;
use PHPUnit\Framework\TestCase;
use TypeError;

class MoneyToWordsTest extends TestCase
{
    /**
     * @test
     * @dataProvider convertProvider
     */
    public function convert($money, $text)
    {
        $coin      = new BRL();
        $converter = new MoneyToWords($coin);
        $result    = $converter->convert($money);

        $this->assertEquals($text, $result);
    }

    /** @test */
    public function invalidCoin()
    {
        $this->expectException(TypeError::class);

        new MoneyToWords('EN');
    }

    public function convertProvider(): array
    {
        $integerValues = include __DIR__ . '/data_provider_integer_values.php';
        $floatValues   = include __DIR__ . '/data_provider_float_values.php';
        $mergedValues  = [...$integerValues,...$floatValues];
        //var_dump($mergedValues);die;
        return $mergedValues;
    }
}
