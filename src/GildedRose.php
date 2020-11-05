<?php

declare(strict_types=1);

namespace App;

use App\Models\Conjured;
use App\Models\Brie;
use App\Models\Backstage;
use App\Models\RegularProduct;
use App\Models\Sulfuras;

class GildedRose
{
    const BRIE = "Aged Brie";
    const BACKSTAGE = "Backstage passes to a TAFKAL80ETC concert";
    const SULFURAS = "Sulfuras, Hand of Ragnaros";
    const CONJURED = "Conjured";
    
    public static function isRegularProduct($name) :bool
    {
        return (self::BRIE != $name) && (self::BACKSTAGE != $name) 
                && (self::SULFURAS != $name) && (self::CONJURED != $name);
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

    public static function updateQuality($items) :void 
    {

        foreach($items as $item) {
            $name = $item->getName();
            $sellIn = $item->getSellIn();
            $quality = $item->getQuality();

            if (self::isConjured($name))
            {
                $conjured = new Conjured($name, $sellIn, $quality);
                $item->quality = $conjured->Update();
                $item->sellIn = $conjured->decreaseSellin();
                return;                                               
            }  
            if (self::isSulfuras($name))
            {
                $sulfuras = new Sulfuras($name, $sellIn, $quality);
                $item->quality = $sulfuras->getQuality(); 
                $item->sellIn = $sulfuras->getSellIn();
                return;               
            }                       
            if (self::isRegularProduct($name)) 
            {                
                $regularProduct = new RegularProduct($name, $sellIn, $quality);
                $item->quality = $regularProduct->Update();
                $item->sellIn = $regularProduct->decreaseSellin();   
                return;                         
            }
            if (self::isBackstage($name)) 
            {
                $backstage = new Backstage($name, $sellIn, $quality);
                $item->quality = $backstage->Update();
                $item->sellIn = $backstage->decreaseSellin();
                return;
            }
            if (self::isBrie($name)) 
            {
                $brie = new Brie($name, $sellIn, $quality);
                $item->quality = $brie->Update();
                $item->sellIn = $brie->decreaseSellin();                
            }                                                                                                                   
        }
    }
}
