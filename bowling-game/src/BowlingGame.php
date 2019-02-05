<?php

declare(strict_types = 1);

final class BowlingGame
{
    private $roll = [];

    public function roll(int $value): void
    {
        $this->assertValidValue($value);

        $this->roll[] = $value;
    }

    private function assertValidValue(int $value): void
    {
        if ($value < 0) {
            throw new InvalidArgumentException();
        }
    }

    public function score(): int
    {
        $score = 0;
        $roll = 0;

        for ($frame = 0; $frame < 10; $frame++) {
            if ($this->isStrike($roll)) {
                $score += 10 + $this->strikeBonus($roll);
                $roll += 1;
            } elseif ($this->isSpare($roll)) {
                $score += 10 + $this->spareBonus($roll);
                $roll += 2;
            } else {
                $score += $this->getDefaultScore($roll);
                $roll += 2;
            }
        }

        return $score;
    }

    private function isStrike(int $roll): bool
    {
        return $this->roll[$roll] === 10;
    }

    private function isSpare(int $roll): bool
    {
        return $this->getDefaultScore($roll) === 10;
    }

    private function getDefaultScore(int $roll): int
    {
        return $this->roll[$roll] + $this->roll[$roll + 1];
    }

    private function strikeBonus(int $roll): int
    {
        return $this->roll[$roll + 1] + $this->roll[$roll + 2];
    }

    private function spareBonus(int $roll): int
    {
        return $this->roll[$roll + 2];
    }
}