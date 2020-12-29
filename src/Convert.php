<?php

declare(strict_types = 1);

namespace Money;

use Money\Coins\I18nInterface;
use Money\Exceptions\MoneyException;

/**
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
class Convert
{
    private Wordify $wordify;

    public function __construct(I18nInterface $coin)
    {
        $this->wordify = new Wordify($coin);
    }

    /**
     * @throws MoneyException
     */
    public function convertNumbersToWords(float $money): string
    {
        return $this->wordify->translateToSentence($money);
    }
}