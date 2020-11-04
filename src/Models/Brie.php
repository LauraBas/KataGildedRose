<?php

namespace App\Models;
use App\Item;
use App\Models\RegularProduct;

Class Brie extends RegularProduct
{
    public function Update() 
    {
        $this->increaseQuality();               
        return $this->quality;
    } 
    
    public function increaseQuality() :void
    {
        if ($this->isLessThanMaxQuality())
        {
            $this->quality += 1;            
        } 
    }
}

