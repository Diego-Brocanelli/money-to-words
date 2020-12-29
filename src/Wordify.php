<?php

declare(strict_types = 1);

namespace Money;

use Money\Coins\I18nInterface;
use Money\Exceptions\InvalidArgumentException;
use NumberFormatter;

/**
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
class Wordify
{
    private I18nInterface $coin;

    public function __construct(I18nInterface $coin)
    {
        $this->coin = $coin;
    }

    public function translateToSentence( float $money ): string
    {
        $data   = explode('.', (string)$money);
        $before = $data[0];
        $cents  = 0;
        if (array_key_exists(1, $data)) {
            $cents = $data[1];
        }

        if ((int)$cents > 99) {
            throw new InvalidArgumentException('The value of cents is invalid, cannot exceed 99.');
        }

        $result = '';

        if ($before > 0) {
            $real = $this->translateToWord($before);

            $separator = ' ';
            if (in_array($before, $this->coin->listThreeDigitsOrMore())) {
                $separator = ' '.$this->coin->separatorDe().' ';
            }

            $textReal = $this->divider( (int)$before, 'real');

            $result = $real .$separator. $textReal;
        }

        if ($before > 0 && $cents > 0) {
            $result .= ' '. $this->coin->divisor() . ' ';
        }

        if ($cents > 0) {
            $cents         = ((int)$cents < 10) ? str_pad($cents, 2, '0') : $cents;
            $textCents     = $this->translateToWord($cents);
            $sentenceCents = $this->divider((int)$cents, 'cents');
            $result       .= $textCents .' '.$sentenceCents;
        }

        return $result;
    }

    private function translateToWord( string $number): string
    {
        $numberFormatted = new NumberFormatter($this->coin->lang(), NumberFormatter::SPELLOUT);

        return $numberFormatted->format($number);
    }

    private function divider( int $number, string $type): string
    {
        $singular = $number > 1 ? false : true;

        if ($type === 'cents') {
            return $this->coin->centsType($singular);
        }

        return $this->coin->realType($singular);
    }
}