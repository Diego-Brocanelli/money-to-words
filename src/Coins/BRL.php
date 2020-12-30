<?php

declare(strict_types=1);

namespace Money\Coins;

use Money\Coins\I18nInterface;

/**
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
class BRL implements I18nInterface
{
    /**
     * For filtering
     *
     * @return array<int,string>
     */
    public function specialCharacter(): array
    {
        return ['R$','r$', '$', ',', '(', ')', '#', ' '];
    }

    public function divisor(): string
    {
        return 'e';
    }

    /**
     * Separetor money string
     */
    public function separatorDe(): string
    {
        return 'de';
    }

    /**
     * Plural and singular, dollar.
     */

    public function realType(bool $singular): string
    {
        if ($singular) {
            return 'real';
        }

        return 'reais';
    }

    /**
     * Plural and singular, cents.
     */
    public function centsType(bool $singular): string
    {
        if ($singular) {
            return 'centavo';
        }

        return 'centavos';
    }

    /**
     * Coin country
     */
    public function lang(): string
    {
        return "pt-BR";
    }

    /**
     * List Three Digits Or More in money
     *
     * @return array<int,string>
     */
    public function listThreeDigitsOrMore(): array
    {
        return [
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
}
