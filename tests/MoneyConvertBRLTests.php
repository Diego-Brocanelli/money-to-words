<?php

require_once __DIR__.'/../vendor/autoload.php';

use Money\Convert\Convert\MoneyToWords;
use PHPUnit\Framework\TestCase;

class MoneyConvertTests extends TestCase
{
    private $converter;

    public function setUp()
    {
        $this->converter = new MoneyToWords('BRL');
    }

    public function testConvertUmReal()
    {
        $money = '1';

        $this->assertEquals('um real', $this->converter->convert($money));
    }

    public function testConvertCentoEUmReais()
    {
        $money = '101';

        $this->assertEquals('cento e um reais', $this->converter->convert($money));    
    }

    public function testConvertCemReais()
    {
        $money = '100';

        $this->assertEquals('cem reais', $this->converter->convert($money));    
    }

    public function testConvertMilReais()
    {
        $money = '1000';

        $this->assertEquals('mil reais', $this->converter->convert($money));    
    }

    public function testConvertUmCentavo()
    {
        $money = '0.01';

        $this->assertEquals('um centavo', $this->converter->convert($money));     
    }

    public function testConvertDoisCentavos()
    {
        $money = '0.02';

        $this->assertEquals('dois centavos', $this->converter->convert($money));     
    }

    public function testConvertCinquentaCentavos()
    {
        $money = '0.50';

        $this->assertEquals('cinquenta centavos', $this->converter->convert($money));     
    }

    public function testConvertSetentaECincoReaisETrintaECincoCentavos()
    {
        $money = '75.35';

        $this->assertEquals('setenta e cinco reais e trinta e cinco centavos', $this->converter->convert($money));
    }

    public function testConvertDezRaisEUmCentavo()
    {
        $money = '10.01';

        $this->assertEquals('dez reais e um centavo', $this->converter->convert($money));
    }

    public function testUmMilhaoDeReais()
    {
        $money = '1000000';

        $this->assertEquals('um milhão de reais', $this->converter->convert($money));    
    }

    public function testumMilhãoQuinhentosEOitentaECincoMilESetecentosEVinteEOitoReaisEUmCentavo()
    {
        $money = '1585728.1';
        
        $string = 'um milhão e quinhentos e oitenta e cinco mil e setecentos e vinte e oito reais e um centavo';
        
        $this->assertEquals($string, $this->converter->convert($money));    
    }

    public function testUmBilhaoDeReais()
    {
        $money = '1000000000';

        $this->assertEquals('um bilhão de reais', $this->converter->convert($money));    
    }

    public function testOneTrilhaoDeReais()
    {
        $money = '1000000000000';

        $this->assertEquals('um trilhão de reais', $this->converter->convert($money));
    }

    /**
     * @expectedException Money\Convert\Exceptions\MoneyException
     * @expectedExceptionMessage This money not valid.
     */
    public function testNotString()
    {
        $money = 10;

        $this->converter->convert($money);    
    }

    /**
     * @expectedException Money\Convert\Exceptions\MoneyException
     * @expectedExceptionMessage This money not valid.
     */
    public function testEmptyString()
    {
        $money = '';

        $this->converter->convert($money);    
    }

    /**
     * @expectedException Money\Convert\Exceptions\LangException
     * @expectedExceptionMessage aaaaa not fount. Please, create a money file base
     */
    public function testLnagNotFound()
    {
        $converter = new MoneyToWords('aaaaa');
    }
}