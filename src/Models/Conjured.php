<?php

namespace App\Models;
use App\Item;
use App\Models\Product;



Class Conjured extends Product implements iUpdate
{
    public function Update() 
    {
        $this->decreaseQualityTwoPoints();        
        return $this->quality; 
    }     
}