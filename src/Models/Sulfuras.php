<?php

namespace App\Models;
use App\Item;

Class Sulfuras extends Item
{
    public function Update()
    {
        return $this->quality && $this->sellIn;
    }
}