<?php

namespace Acme;

final class FizzBuzz
{
    public function execute(int $number)
    {
        if ($number % 15 === 0) {
            return 'fizzbuzz';
        }

        if ($number % 3 === 0) {
            return 'fizz';
        }

        if ($number % 5 === 0) {
            return 'buzz';
        }

        return $number;
    }

    public function executeUp(int $input): array
    {
        return array_map(
            function(int $value) {
                return $this->execute($value);
            },
            range(1, $input)
        );
    }
}