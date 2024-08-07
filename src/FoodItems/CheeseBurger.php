<?php
namespace FoodItems;

require_once "src/FoodItems/FoodItem.php";

class CheeseBurger extends FoodItem
{
  const CATEGORY = 'Burgers';
  private int $cookingTime = 7;

  // カテゴリを取得する静的メソッド
  public static function getCategory(): string
  {
    return self::CATEGORY;
  }

  public function getCookingTime(): int
  {
    return $this->cookingTime;
  }
}
