<?php

namespace App\Models;
use App\Item;

Class Brie extends Item 
{
    public function Update() 
    {
        $this->increaseQuality();
        
        return $this->quality; 
    } 
    public function canIncreaseQuality() :bool
    {
        return $this->quality < 50;
    } 
    public function increaseQuality() :void
    {
        if ($this->canIncreaseQuality())
        {
            $this->quality += 1;            
        }    
    }
}

