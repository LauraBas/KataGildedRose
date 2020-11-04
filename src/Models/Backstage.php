<?php

namespace App\Models;
use App\Item;
use App\Models\RegularProduct;

Class Backstage extends RegularProduct
{
    public function Update()
    {
        $this->updateBackstageQuality();
        return $this->quality;
    }

    public function isSellinLessThan11() :bool
    {
        return $this->sellIn < 11;
    } 

    public function isSellinLessThan6() :bool 
    {
        return $this->sellIn < 6;
    }

    public function increaseQualityOnePoint() :void 
    {
        if ($this->isLessThanMaxQuality())
        {
            $this->quality += 1;
        }
    }

    public function updateBackstageQuality() :void
    {
                    
        $this->increaseQualityOnePoint();
        
        if ($this->isSellinLessThan11())
        {
            $this->increaseQualityOnePoint();
        }
        if ($this->isSellinLessThan6())
        {
            $this->increaseQualityOnePoint();
        }
        if ($this->isSellin0())
        {
            $this->quality = 0;
        }
        
    }
}
