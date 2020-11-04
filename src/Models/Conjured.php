<?php

namespace App\Models;
use App\Item;
use App\Models\RegularProduct;



Class Conjured extends RegularProduct
{
    public function Update() 
    {
        $this->decreaseQualityTwoPoints();        
        return $this->quality; 
    }     
}