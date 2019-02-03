<?php

declare(strict_types = 1);

final class StringCalculator
{
    const MAX_ALLOWED = 1000;

    public  function add(string $numbers): int
    {
        $numbers = $this->parseNumbers($numbers);
        
        return array_sum(
            array_map(
                function(string $item) {
                    $value = intval($item);
                    
                    $this->assertInvalidValue($value);
                    
                    if ($value >= self::MAX_ALLOWED) {
                        return 0;
                    }

                    return $value;
                },
                $numbers
            )
        );
    }

    private function assertInvalidValue(int $value): void
    {
        if ($value < 0) {
            throw new InvalidArgumentException("Invalid number provided: {$value}");
        }
    }

    private function parseNumbers(string $numbers): array
    {
        return array_map('intval', preg_split('/\s*(,|\\\n)\s*/', $numbers));
    }
}
