<?php

declare(strict_types = 1);

namespace Money\Convert\i18n;

use Money\Convert\i18n\I18nInterface;

/**
 * Coin BRL <Brazil>
 *
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
class BRL implements I18nInterface
{
    /**
     * For filtering
     */
    public array $specialCharacter = ['R$','r$', '$', ',', '(', ')', '#', ' '];

    /**
     * Divisor money string
     */
    public string $divisor = 'e';

    /**
     * Separetor money string
     */
    public string $separetorDe = 'de';
    
    /**
     * Plural and singular, dollar.
     */
    public array $realType = [
        'real',
        'reais'
    ];

    /**
     * Plural and singular, cents.
     */
    public array $centsType = [
        'centavo',
        'centavos'
    ];

    /**
     * Coin country
     */
    public string $lang = "pt-BR";

    /**
     * List Three Digits Or More in money
     */
    public array $listThreeDigitsOrMore = [
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
    ];
}