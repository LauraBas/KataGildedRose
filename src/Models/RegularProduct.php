<?php

namespace App\Models;
use App\Item;

Class RegularProduct extends Item
{
    public function Update()
    {
        $this->decreaseQuality();
        return $this->quality; 
    }
    
    CONST MINQUALITY = 0;
    CONST MAXQUALITY = 50;

    public function isSellin0() :bool
    {
        return $this->sellIn == 0;
    }

    public function isQualityLessThan0() :bool
    {
        return $this->quality < $this::MINQUALITY;
    }

    public function decreaseQuality() :void 
    {
        if ($this->isSellin0())
        {
            $this->decreaseQualityTwoPoints();            
        } 
        else
        {
            $this->decreaseQualityOnePoint();
        }
    }

    public function decreaseQualityOnePoint() :void
    {
        if ($this->isMoreThanMinQuality())
        {            
            $this->quality -= 1;
            if ($this->isQualityLessThan0())
            {
                $this->quality = $this::MINQUALITY;
            }
        }            
    }

    public function decreaseQualityTwoPoints() :void 
    {
        $this->decreaseQualityOnePoint();
        $this->decreaseQualityOnePoint();
    }

    public function isLessThanMaxQuality() :bool 
    {
        return ($this->quality < $this::MAXQUALITY);
    }
    public function isMoreThanMinQuality() :bool
    {
        return ($this->quality > $this::MINQUALITY);
    }
    public function decreaseSellin() :int 
    {
        return $this->sellIn -= 1;        
    }
}