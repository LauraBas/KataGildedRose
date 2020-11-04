<?php

namespace App\Models;
use App\Item;
use App\Models\RegularProduct;

Class Sulfuras extends RegularProduct
{
    public function Update()
    {
        return $this->quality;
    }
}