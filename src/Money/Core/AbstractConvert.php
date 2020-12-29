<?php

declare(strict_types = 1);

namespace Money\Convert\Core;

use Money\Convert\Core\ConvertInterface;
use Money\Convert\Exceptions\LangException;
use Money\Convert\Exceptions\MoneyException;
use Money\Convert\Validation\Validations;

use Money\Convert\i18n\BRL;

/**
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
abstract class AbstractConvert implements ConvertInterface
{
    const MONEY_NOT_VALID = 'This money not valid.';

    protected string $number;
    protected BRL $langConvert;

    public function __construct( string $lang) 
    {
        $path = __DIR__.'/../i18n/'.$lang.'.php';

        if(!file_exists($path)){
            throw new LangException("{$lang} not fount. Please, create a money file base");
        }
                     
        $nameSpace = "Money\Convert\i18n\\{$lang}";
        $langType  = new $nameSpace;
        
        $this->langConvert = $langType;
    }
    
    /**
     * Convert numbers to words.
     * 
     * @throws MoneyException
     */
    public function convert(string $money): string
    {
        $this->number = $money;
        $validations  = new Validations();

        if(!$validations->isValid($money, $this->langConvert)){
            throw new MoneyException(self::MONEY_NOT_VALID);
        }

        $data = $this->explodeData();

        return $this->mountToWord($data);
    }

    /**
     * Explode float number in two slices.
     */
    private function explodeData(): array
    {
        return explode('.', $this->number);
    }
    
    /**
     * Convert number in word.
     */
    private function convertToWord(string $number): string
    {
        $numberFormatted = new \NumberFormatter($this->langConvert->lang, \NumberFormatter::SPELLOUT);
        $result          = $numberFormatted->format($number);

        return $result;
    }

    /**
     * Adding divider between strings
     */
    private function divisor( string $number, string $type): string
    {
        $indice = 0;

        if($number > 1 ){
            $indice = 1;
        }

        $result = $this->langConvert->realType[$indice];

        if($type == 'cents'){
            $result = $this->langConvert->centsType[$indice];
        }

        return $result;
    }

    /**
     * Words mount
     */
    private function mountToWord(array $data): string
    {
        $result = '';
        
        if((int)$data[0] > 0 ){
            $real = $this->convertToWord($data[0]);

            $separator = ' ';
            if(in_array((int)$data[0], $this->langConvert->listThreeDigitsOrMore)){
                $separator = ' '.$this->langConvert->separetorDe.' ';
            }

            $textReal = $this->divisor($data[0], 'real');

            $result   = $real .$separator. $textReal;
        }

        if(array_key_exists(1, $data)){
            if((int)$data[0] > 0 && (int)$data[1] > 0){
                $result .=  ' '. $this->langConvert->divisor . ' ';
            }
        }


        if(array_key_exists(1, $data)){
            if( (int)$data[1] > 0 ){
                $cents     = $this->convertToWord($data[1]);
                $textCents = $this->divisor($data[1], 'cents');
                
                $result   .= $cents .' '.$textCents;
            }
        }

        return $result;
    }
}