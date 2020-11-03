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
    public function canDecreaseQuality() :bool
    {
        return $this->quality > 0;
    } 

    public function decreaseQuality() :void
    {
        if ($this->canDecreaseQuality())
        {
            if ($this->sellIn == 0)
            {
                $this->quality -= 2;
            }
            else
            {
                $this->quality -= 1;
            }
            if ($this->quality < 0)
            {
                $this->quality = 0;
            }
        }            
    }
}