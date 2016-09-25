<?php

namespace Money\Convert\i18n;

/**
 * Coin BRL <Brazil>
 *
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
class BRL
{
    /**
     * For filtering
     * @var array
     */
    public $specialCharacter = array('R$','r$', '$', ',', '(', ')', '#', ' ');

    /**
     * Divisor money string
     * 
     * @var string
     */
    public $divisor = 'e';

    /**
     * Separetor money string
     * 
     * @var string
     */
    public $separetorDe = 'de';
    
    /**
     * Plural and singular, dollar.
     * 
     * @var array
     */
    public $realType = array(
        'real',
        'reais'
    );

    /**
     * Plural and singular, cents.
     * 
     * @var array
     */
    public $centsType = array(
        'centavo',
        'centavos'
    );

    /**
     * Coin country
     * 
     * @var string
     */
    public $lang = "pt-BR";

    /**
     * List Three Digits Or More in money
     * 
     * @return array
     */
    public $listThreeDigitsOrMore = array(
        '1000000',
        '1000000000',
        '1000000000000',
        '1000000000000000',
        '1000000000000000000',
        '1000000000000000000000',
        '1000000000000000000000000',
        '1000000000000000000000000000',
        '1000000000000000000000000000000',
        '1000000000000000000000000000000000',
        '1000000000000000000000000000000000000',
        '1000000000000000000000000000000000000000',
    );
}