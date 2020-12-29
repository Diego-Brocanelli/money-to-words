<?php

declare(strict_types = 1);

namespace Money\Coins;

/**
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
interface I18nInterface
{
    /**
     * For filtering
     */
    public function specialCharacter(): array;

    /**
     * Divisor money string
     */
    public function divisor(): string;

    /**
     * Separetor money string
     */
    public function separatorDe(): string;
    
    /**
     * Plural and singular, dollar.
     */
    public function realType(bool $singular): string;

    /**
     * Plural and singular, cents.
     */
    public function centsType(bool $singular): string;

    /**
     * Coin country
     */
    public function lang(): string;

    /**
     * List Three Digits Or More in money
     */
    public function listThreeDigitsOrMore(): array;
}
