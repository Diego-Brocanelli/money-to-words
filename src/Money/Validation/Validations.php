<?php

namespace Money\Convert\Validation;

use Money\Convert\i18n\BRL;

/**
 * Validations money value.
 * 
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
class Validations
{
    /**
     * Verify is money is valid.
     */
    public function isValid(string $money, BRL $lang): bool
    {
        return $this->rules($money, $lang);
    }

    /**
     * Rules for validations.
     */
    private function rules(string $money, BRL $lang): bool
    {
        $result = true;

        if( empty($money) ){
            $result = false;
        }

        if( $money == 0 ){
            $result = false;
        }

        foreach ($lang->specialCharacter as $string) {
            $money = str_ireplace($string, '', $money);
        }

        return $result;
    }
}