<?php

namespace Money\Convert\Core;

/**
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
interface ConvertInterface
{
    /**
     * Convert money to words
     * 
     * @param string $money
     * @return string
     */
    public function convert($money);
}