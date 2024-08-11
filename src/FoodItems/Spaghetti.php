<?php

namespace FoodItems;

class Spaghetti extends FoodItem
{
  const CATEGORY = 'Pastas';
  const COOKING_TIME = 10;

  protected string $description = "delicious spaghetti";
  protected float $price = 12.0;
  public static function getCategory(): string
  {
    return self::CATEGORY;
  }
}
