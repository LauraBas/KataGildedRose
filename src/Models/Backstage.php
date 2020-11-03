<?php

namespace App\Models;
use App\Item;

Class Backstage extends Item
{
    public function Update()
    {
        $this->increaseQuality();
        return $this->quality;
    }
    public function canIncreaseQuality()
    {
        return $this->quality < 50;
    }
    public function increaseQuality()
    {
        if ($this->canIncreaseQuality())
        {    
            $this->quality += 1;
            
            if ($this->sellIn < 11)
            {
                $this->quality += 1;
            }
            if ($this->sellIn < 6)
            {
                $this->quality += 1;
            }
            if ($this->sellIn == 0)
            {
                $this->quality = 0;
            }
        }
    }
}
