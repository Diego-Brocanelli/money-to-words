<?php

declare(strict_types=1);

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

    public function translateToSentence(float $money): string
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

        $result = $this->wordifyBefore($before);

        if ($before > 0 && $cents > 0) {
            $result .= ' ' . $this->coin->divisor() . ' ';
        }

        $result .= $this->wordifyCents((string)$cents);

        return $result;
    }

    private function translateToWord(string $number): string
    {
        $numberFormatted = new NumberFormatter($this->coin->lang(), NumberFormatter::SPELLOUT);

        return $numberFormatted->format($number);
    }

    private function divider(int $number, string $type): string
    {
        $singular = $number > 1 ? false : true;

        if ($type === 'cents') {
            return $this->coin->centsType($singular);
        }

        return $this->coin->realType($singular);
    }

    private function wordifyBefore(string $before): string
    {
        if ($before > 0) {
            $real = $this->translateToWord($before);

            $separator = ' ';
            if (in_array($before, $this->coin->listThreeDigitsOrMore())) {
                $separator = ' ' . $this->coin->separatorDe() . ' ';
            }

            $textReal = $this->divider((int)$before, 'real');

            return $real . $separator . $textReal;
        }

        return '';
    }

    private function wordifyCents(string $cents): string
    {
        if ($cents <= 0) {
            return '';
        }

        $cents         = ($cents < 10) ? str_pad((string)$cents, 2, '0') : $cents;
        $textCents     = $this->translateToWord((string)$cents);
        $sentenceCents = $this->divider((int)$cents, 'cents');

        return "{$textCents} {$sentenceCents}";
    }
}
