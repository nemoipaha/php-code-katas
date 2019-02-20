<?php

namespace App;

final class GildedRose
{
    private const LOOKUP = [
        'normal' => Normal::class,
        'Aged Brie' => Brie::class,
        'Sulfuras, Hand of Ragnaros' => Sulfuras::class,
        'Backstage passes to a TAFKAL80ETC concert' => Backstage::class
    ];

    public static function of($name, $quality, $sellIn)
    {
        $class = self::LOOKUP[$name];

        return new $class($quality, $sellIn);
    }
}
