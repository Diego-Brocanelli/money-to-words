<?php

declare(strict_types=1);

namespace Money\Tests;

use Money\Coins\BRL;
use Money\Exceptions\InvalidArgumentException;
use Money\Wordify;
use PHPUnit\Framework\TestCase;
use TypeError;

class WordifyTest extends TestCase
{
    /**
    * @test
    * @dataProvider sentencesProvider
    */
    public function translateToSentence($money, $text)
    {
        $wordify = new Wordify(new BRL());
        $result  = $wordify->translateToSentence($money);

        $this->assertEquals($text, $result);
    }

    /** @test */
    public function invalidValue()
    {
        $wordify = new Wordify(new BRL());

        $this->expectException(InvalidArgumentException::class);

        $wordify->translateToSentence(0.999);
    }

    /** @test */
    public function typeErrorCents()
    {
        $wordify = new Wordify(new BRL());

        $this->expectException(TypeError::class);

        $wordify->translateToSentence('0.99');
    }

    public function sentencesProvider(): array
    {
        $integerValues = include __DIR__ . '/data_provider_integer_values.php';
        $floatValues   = include __DIR__ . '/data_provider_float_values.php';
        $mergedValues  = [...$integerValues, ...$floatValues];

        return $mergedValues;
    }
}
