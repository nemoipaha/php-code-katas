<?php

namespace Acme;

final class Tennis
{
    private $john;
    private $jane;

    private $lookup = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Fourty',
    ];

    public function __construct(Player $john, Player $jane)
    {
        // game players
        $this->john = $john;
        $this->jane = $jane;
    }

    public function score()
    {
        if ($this->hasAWinner()) {
            return 'Win for ' . $this->winner()->getName();
        }

        if ($this->hasAdvantage()) {
            return 'Advantage ' . $this->winner()->getName();
        }
        
        if ($this->inDeuce()) {
            return 'Deuce';
        }

        return sprintf(
            '%s-%s',
            $this->lookup[$this->john->getPoints()],
            $this->isTie() ? 'All' : $this->lookup[$this->jane->getPoints()]
        );
    }

    private function isTie(): bool
    {
        return $this->lookup[$this->john->getPoints()] === $this->lookup[$this->jane->getPoints()];
    }

    public function winner(): Player
    {
        return $this->john->getPoints() > $this->jane->getPoints()
            ? $this->john
            : $this->jane;
    }

    private function hasAWinner(): bool
    {
        // leading by 2
        // 4 or more game sets
        
        return $this->hasEnoughPointsToBeWon() && $this->isLeadingBy(2);
    }

    private function hasAdvantage(): bool
    {
        return $this->hasEnoughPointsToBeWon() && $this->isLeadingBy(1);
    }

    private function hasEnoughPointsToBeWon(): bool
    {
        return max($this->john->getPoints(), $this->jane->getPoints()) >= 4;
    }

    private function isLeadingBy(int $value): bool
    {
        return abs($this->john->getPoints() - $this->jane->getPoints()) >= $value;
    }

    private function inDeuce(): bool
    {
        return $this->john->getPoints() + $this->jane->getPoints() >= 6 && $this->isTie();
    }
}
