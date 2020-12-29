<?php

namespace Money\Convert\Core;

/**
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
interface ConvertInterface
{
    /**
     * Convert money to words
     */
    public function convert(string $money): string;
}