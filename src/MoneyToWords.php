<?php

namespace Money;

use Money\Coins\I18nInterface;

/**
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
class MoneyToWords
{
    private Convert $convert;

    public function __construct(I18nInterface $coin)
    {
        $this->convert = new Convert($coin);
    }

    public function convert(float $money): string
    {
        return $this->convert->convertNumbersToWords($money);
    }
}
