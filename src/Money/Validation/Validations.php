<?php

namespace Money\Convert\Validation;

/**
 * Validations money value.
 * 
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
class Validations
{
    /**
     * Verify is money is valid.
     * 
     * @param string $money
     * @param Object $lang
     * 
     * @return Boolean description 
     */
    public function isValid($money, $lang)
    {
        return $this->rules($money, $lang);
    }

    /**
     * Rules for validations.
     * 
     * @param string $money 
     * @param Object $lang 
     * @return boolean
     */
    private function rules($money, $lang)
    {
        $result = true;
        
        if(!is_string($money)){
            $result = false;
        }

        if(empty($money)){
            $result = false;
        }
        
        if($money == 0){
            $result = false;
        }

        $number = $money;

        foreach ($lang->specialCharacter as $string) {
            
            $money = str_ireplace($string, '', $money);
        }

        return $result;
    }
}