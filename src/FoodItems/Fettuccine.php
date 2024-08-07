<?php
namespace FoodItems;
require_once "src/FoodItems/FoodItem.php";

class Fettuccine extends FoodItem
{
  // カテゴリを表す定数クラス変数
  const CATEGORY = 'Pastas';
  private int $cookingTime = 12;


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