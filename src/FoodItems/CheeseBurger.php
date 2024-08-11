<?php
namespace FoodItems;

use FoodItems\FoodItem;

class CheeseBurger extends FoodItem
{
  const CATEGORY = 'Burgers';
  const COOKING_TIME = 7;

  protected string $description = "delicious cheese burger";
  protected float $price = 10.0;
  // カテゴリを取得する静的メソッド
  public static function getCategory(): string
  {
    return self::CATEGORY;
  }
}
