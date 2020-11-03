<?php

declare(strict_types=1);

namespace App;

use App\Models\Conjured;
use App\Models\Brie;

class GildedRose
{
    const BRIE = "Aged Brie";
    const BACKSTAGE = "Backstage passes to a TAFKAL80ETC concert";
    const SULFURAS = "Sulfuras, Hand of Ragnaros";
    const CONJURED = "Conjured";
    
    public static function isLessThanMaxQuality($item) :bool
    {
        return $item->getQuality() < 50;
    }
    public static function isMoreThanMinQuality($item) :bool
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
    public static function isConjured($name) :bool
    {
        return self::CONJURED == $name;
    }
    public static function decreaseQualityOnePoint($item) :void
    {
        if(self::isMoreThanMinQuality($item))
        {
            $item->setQuality($item->getQuality() - 1);
        }
    }
    
    public static function increaseQualityOnePoint($item) :void
    {
        if (self::isLessThanMaxQuality($item))
        {
            $item->setQuality($item->getQuality() + 1);

        }
    }
    public static function isSellinLessThan0($item) :bool
    {
        return $item->getSellIn() < 0;
    }
    public static function isSellin0($item) :bool
    {
        return $item->getSellIn() == 0;
    }
    
    public static function isSellinLessThan11($item) :bool
    {
        return $item->getSellIn() < 11;
    }
    public static function isSellinLessThan6($item) :bool
    {
        return $item->getSellIn() < 6;
    }
    public static function decreaseSellIn($item) :void
    {
        if (!self::isSulfuras($item->name)) {
            $item->setSellIn($item->getSellIn() - 1);

        }
    }

    public static function canDecreaseQuality($item) :bool 
    {
        return self::isMoreThanMinQuality($item) && !self::isSulfuras($item->name);
    }


    public static function updateQuality($items) :void 
    {

        foreach($items as $item) {
            $name = $item->getName();
            $sellIn = $item->getSellIn();
            $quality = $item->getQuality();

            if (self::isConjured($name)){
                $conjured = new Conjured($name, $sellIn, $quality);
                $item->quality = $conjured->Update();
               
            }                         
            else if (self::isRegularProduct($name)) 
            {
                if(self::canDecreaseQuality($item))
                {
                    self::decreaseQualityOnePoint($item);
                    if(self::isSellin0($item))
                    {
                        self::decreaseQualityOnePoint($item);
                    }
                }
            }
            else if (self::isBackstage($name)) {
                
                self::increaseQualityOnePoint($item);
                
                if (self::isSellinLessThan11($item)) {
                    
                    self::increaseQualityOnePoint($item);
                    
                }
                if (self::isSellinLessThan6($item)) {
                    
                    self::increaseQualityOnePoint($item);                    
                }
                if (self::isSellin0($item))
                {
                    
                    $item->setQuality(0);                        
                     
                }
            }
            else if (self::isBrie($name)) 
            {
                $brie = new Brie($name, $sellIn, $quality);
                $item->quality = $brie->Update();
                
            }                                                                                                        
            self::decreaseSellin($item);            
        }

    }
}
