<?php

namespace App;

final class Brie
{
    public $quality;
    public $sellIn;

    public function __construct(int $quality, int $sellIn)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function tick()
    {
        $this->sellIn -= 1;

        if ($this->quality >= 50) {
            return;
        }

        $this->quality += 1;

        if ($this->sellIn <= 0 && $this->quality < 50) {
            $this->quality += 1;
        }
    }
}