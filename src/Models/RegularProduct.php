<?php

namespace App\Models;
use App\Item;
use App\Models\Product;

Class RegularProduct extends Product implements iUpdate
{
    public function Update()
    {
        $this->decreaseQuality();
        return $this->quality; 
    }
    
}   