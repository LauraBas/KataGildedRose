<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\GildedRose;
use App\Item;

class GildedRoseTest extends TestCase
{

	public function test_Some_Item_Decrease_Quality_in_1_unit()
	{
		$someItem = new Item("Some Item", 2, 3);

		GildedRose::updateQuality([$someItem]);

		$this->assertEquals(2, $someItem->quality);
	}

	public function test_when_sellin__pass_quality_decrease_twice()
	{
		$someItem = new Item("Some Item", 0, 3);

		GildedRose::updateQuality([$someItem]);

		$this->assertEquals(1, $someItem->quality);
	}
	public function test_quality_is_always_positive()
	{
		$someItem = new Item("Some Item", 0, 1);

		GildedRose::updateQuality([$someItem]);

		$this->assertEquals(0, $someItem->quality);
	}
	public function test_brie_increase_quality()
	{
		$someItem = new Item("Aged Brie", 1, 1);

		GildedRose::updateQuality([$someItem]);

		$this->assertEquals(2, $someItem->quality);
	}
	public function test_quality_is_always_less_50()
	{
		$someItem = new Item("Aged Brie", 1, 50);

		GildedRose::updateQuality([$someItem]);

		$this->assertEquals(50, $someItem->quality);
	}
	public function test_backstage_Passes_increase_3_quality_when_sellin_is_10_to_5()
	{
		$someItem = new Item("Backstage passes to a TAFKAL80ETC concert", 8, 2);

		GildedRose::updateQuality([$someItem]);

		$this->assertEquals(4, $someItem->quality);
	}
	public function test_backstage_Passes_increase_2_quality_when_sellin_is_5_to_0()
	{
		$someItem = new Item("Backstage passes to a TAFKAL80ETC concert", 2, 2);

		GildedRose::updateQuality([$someItem]);

		$this->assertEquals(5, $someItem->quality);
	}
	public function test_backstage_Passes_quality_is_0_when_sellin_is_0()
	{
		$someItem = new Item("Backstage passes to a TAFKAL80ETC concert", 0, 2);

		GildedRose::updateQuality([$someItem]);

		$this->assertEquals(0, $someItem->quality);
	}
}
