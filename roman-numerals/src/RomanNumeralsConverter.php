<?php

final class RomanNumeralsConverter
{
    private $lookup = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I'
    ];

    public function convert(int $number): string
    {
        // foreach ($this->lookup as $value => $symbol) {
        //     while ($number >= $value) {
        //         $res .= $symbol;
        //         $number -= $value;
        //     }    
        // }

        return array_reduce(
            array_keys($this->lookup),
            function(string $prev, int $key) use(&$number): string {
                while ($number >= $key) {
                    $prev .= $this->lookup[$key];
                    $number -= $key;
                }

                return $prev;
            },
            ''
        );
    }
}