<?php
namespace FoodItems;

require_once "src/FoodItems/FoodItem.php";

class Spaghetti extends FoodItem
{
  const CATEGORY = 'Pastas';

  public static function getCategory(): string
  {
    return self::CATEGORY;
  }
}
