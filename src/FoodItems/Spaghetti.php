<?php
namespace FoodItems;

require_once "src/FoodItems/FoodItem.php";

class Spaghetti extends FoodItem
{
  const CATEGORY = 'Pastas';
  private int $cookingTime = 10;

  protected string $description = "delicious spaghetti";
  protected float $price = 12.0;
  public static function getCategory(): string
  {
    return self::CATEGORY;
  }

  public function getCookingTime(): int
  {
    return $this->cookingTime;
  }
}
