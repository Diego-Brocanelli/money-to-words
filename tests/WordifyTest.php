<?php

declare(strict_types = 1);

use Money\Coins\BRL;
use Money\Exceptions\InvalidArgumentException;
use Money\Wordify;
use PHPUnit\Framework\TestCase;

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
        return [
            [0.01, 'um centavo'],
            [0.1, 'dez centavos'],
            [0.89, 'oitenta e nove centavos'],
            [1.0, 'um real'],
            [1.05, 'um real e cinco centavos'],
            [1.5, 'um real e cinquenta centavos'],
            [2.0, 'dois reais'],
            [13.24, 'treze reais e vinte e quatro centavos'],
            [22.22, 'vinte e dois reais e vinte e dois centavos'],
            [30.26, 'trinta reais e vinte e seis centavos'],
            [77.87, 'setenta e sete reais e oitenta e sete centavos'],
            [100.0, 'cem reais'],
            [234.67, 'duzentos e trinta e quatro reais e sessenta e sete centavos'],
            [999.99, 'novecentos e noventa e nove reais e noventa e nove centavos'],
            [1000.0, 'mil reais'],
            [1000000.0, 'um milhão de reais'],
            [1000000000.0, 'um bilhão de reais'],
        ];
    }
}