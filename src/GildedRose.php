<?php

declare(strict_types=1);

namespace App;

class GildedRose
{
    const BRIE = "Aged Brie";
    const BACKSTAGE = "Backstage passes to a TAFKAL80ETC concert";
    const SULFURAS = "Sulfuras, Hand of Ragnaros";
    
    public static function isLessThanMoreQuality($item) :bool
    {
        return $item->getQuality() < 50;
    }
    public static function isMoreThanLessQuality($item) :bool
    {
        return $item->getQuality() > 0;
    }
    public static function isRegularProduct($name) :bool
    {
        return (self::BRIE != $name) && (self::BACKSTAGE != $name);
    }
    public static function isSulfuras($name) :bool
    {
        return self::SULFURAS == $name;
    }
    public static function isBrie($name) :bool
    {
        return self::BRIE == $name;
    }
    public static function isBackstage($name) :bool
    {
        return self::BACKSTAGE == $name;
    }
    public static function decreaseQualityOnePoint($item)
    {
        $item->setQuality($item->getQuality() - 1);
    }

    public static function increaseQualityOnePoint($item)
    {
        $item->setQuality($item->getQuality() + 1);
    }
    public static function isSellin0($item) :bool
    {
        return $item->getSellIn() < 0;
    }
    
    public static function isSellinLessThan11($item) :bool
    {
        return $item->getSellIn() < 11;
    }
    public static function isSellinLessThan6($item) :bool
    {
        return $item->getSellIn() < 6;
    }
    public static function decreaseSellIn($item)
    {
        $item->setSellIn($item->getSellIn() - 1);
    }

    public static function updateQuality($items)
    {
        foreach($items as $item) {
            $name = $item->getName();
                         
            if (self::isRegularProduct($name)) {
                if (self::isMoreThanLessQuality($item)) {
                    if (!self::isSulfuras($name)) {
                        self::decreaseQualityOnePoint($item);
                    }
                }
            } else {
                if (self::isLessThanMoreQuality($item)) {
                    self::increaseQualityOnePoint($item);
                    if (self::isBackstage($name)) {
                        if (self::isSellinLessThan11($item)) {
                            if (self::isLessThanMoreQuality($item)) {
                                self::increaseQualityOnePoint($item);
                            }
                        }
                        if (self::isSellinLessThan6($item)) {
                            if (self::isLessThanMoreQuality($item)) {
                                self::increaseQualityOnePoint($item);
                            }
                        }
                    }
                }
            }

            if (!self::isSulfuras($name)) {
                self::decreaseSellIn($item);
            }

            if (self::isSellin0($item)) {
                if (!self::isBrie($name)) {
                    if (!self::isBackstage($name)) {
                        if (self::isMoreThanLessQuality($item)) {
                            if (!self::isSulfuras($name)) {
                                self::decreaseQualityOnePoint($item);
                            }
                        }
                    } else {
                        $item->setQuality($item->getQuality() - $item->getQuality());
                    }
                } else {
                    if (self::isLessThanMoreQuality($item)) {
                        self::increaseQualityOnePoint($item);
                    }
                }
            }
        }
    }
}
