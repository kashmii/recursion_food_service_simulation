<?php
require_once "src/FoodItems/FoodItem.php";

class CheeseBurger extends FoodItem
{
  const CATEGORY = 'Burgers';

  // カテゴリを取得する静的メソッド
  public static function getCategory(): string
  {
    return self::CATEGORY;
  }
}
