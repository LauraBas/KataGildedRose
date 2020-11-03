<?php

namespace App\Models;
use App\Item;



Class Conjured extends Item
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
    public function decreaseQuality()
    {
        if ($this->canDecreaseQuality())
        {
            $this->quality -= 2;
            if ($this->quality < 0)
            {
                $this->quality = 0;
            }
        }    
    }
}