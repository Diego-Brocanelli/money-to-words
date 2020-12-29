<?php

namespace Money\Convert\Convert;

use Money\Convert\Core\AbstractConvert;

/**
 * Convert money to words.
 * 
 * @example BRL (Brazilian Coin)
 * 
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
class MoneyToWords extends AbstractConvert
{
    public function __construct(string $lang)
    {
        parent::__construct($lang);
    }
}