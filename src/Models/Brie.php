<?php

namespace App\Models;
use App\Item;
use App\Models\Product;

Class Brie extends Product implements iUpdate
{
    public function Update() 
    {
        $this->increaseQuality();               
        return $this->quality;
    } 
    

}

