<?php

declare(strict_types = 1);

require_once __DIR__.'/../vendor/autoload.php';

use Money\Convert\Convert\MoneyToWords;
use Money\Convert\Exceptions\LangException;
use Money\Convert\Exceptions\MoneyException;
use PHPUnit\Framework\TestCase;

class MoneyConvertTest extends TestCase
{
    private $converter;

    public function setUp(): void
    {
        parent::setUp();

        $this->converter = new MoneyToWords('BRL');
    }

    /** @test */
    public function oneReal()
    {
        $money = '1';

        $this->assertEquals('um real', $this->converter->convert($money));
    }

    /** @test */
    public function oneHhundredAndOneReais()
    {
        $money = '101';

        $this->assertEquals('cento e um reais', $this->converter->convert($money));    
    }

    /** @test */
    public function oneHundredReais()
    {
        $money = '100';

        $this->assertEquals('cem reais', $this->converter->convert($money));    
    }

    /** @test */
    public function thousandReais()
    {
        $money = '1000';

        $this->assertEquals('mil reais', $this->converter->convert($money));    
    }

    /** @test */
    public function onteCents()
    {
        $money = '0.01';

        $this->assertEquals('um centavo', $this->converter->convert($money));     
    }

    /** @test */
    public function twoCents()
    {
        $money = '0.02';

        $this->assertEquals('dois centavos', $this->converter->convert($money));     
    }

    /** @test */
    public function fiftyCents()
    {
        $money = '0.50';

        $this->assertEquals('cinquenta centavos', $this->converter->convert($money));     
    }

    /** @test */
    public function seventyFiveReaisAndThirtyFiveCents()
    {
        $money = '75.35';

        $this->assertEquals('setenta e cinco reais e trinta e cinco centavos', $this->converter->convert($money));
    }

    /** @test */
    public function tenReaisAndACent()
    {
        $money = '10.01';

        $this->assertEquals('dez reais e um centavo', $this->converter->convert($money));
    }

    /** @test */
    public function oneMillionReais()
    {
        $money = '1000000';

        $this->assertEquals('um milhão de reais', $this->converter->convert($money));    
    }

    /** @test */
    public function oneMillionFiveHundredEightyEightThousandThousandEightTwentyEightRealAndOneCent()
    {
        $money = '1585728.1';
        
        $string = 'um milhão e quinhentos e oitenta e cinco mil e setecentos e vinte e oito reais e um centavo';
        
        $this->assertEquals($string, $this->converter->convert($money));    
    }

    /** @test */
    public function oneBillionReais()
    {
        $money = '1000000000';

        $this->assertEquals('um bilhão de reais', $this->converter->convert($money));    
    }

    /** @test */
    public function aTrillionReais()
    {
        $money = '1000000000000';

        $this->assertEquals('um trilhão de reais', $this->converter->convert($money));
    }

    /** @test */
    public function testNotString()
    {
        $this->expectException(TypeError::class);

        $money = 10;

        $this->converter->convert($money);
    }

    /** @test */
    public function emptyString()
    {
        $this->expectException(MoneyException::class);

        $money = '';

        $this->converter->convert($money);    
    }

    /** @test */
    public function langNotFound()
    {
        $this->expectException(LangException::class);

        ( new MoneyToWords('aaaaa') );
    }
}