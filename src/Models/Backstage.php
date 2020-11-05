<?php

namespace App\Models;
use App\Item;
use App\Models\Product;

Class Backstage extends Product implements iUpdate
{
    public function Update()
    {
        $this->updateBackstageQuality();
        return $this->quality;
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
            $this->quality = Product::MINQUALITY;
        }
        
    }
}
