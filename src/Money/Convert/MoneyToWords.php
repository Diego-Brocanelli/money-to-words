<?php

namespace Money\Convert\Convert;

use Money\Convert\Core\AbstractConvert;

/**
 * Convert money to words.
 * 
 * @param string $lang Concerning which country the coin belongs
 * 
 * @example BRL (Brazilian Coin)
 * 
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
class MoneyToWords extends AbstractConvert
{
    /**
     * @param string $lang coin country
     */
    public function __construct($lang)
    {
        parent::__construct($lang);
    }
}