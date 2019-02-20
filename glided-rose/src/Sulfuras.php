<?php

namespace App;

final class Sulfuras
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
        // @todo bad code
        return;
    }
}