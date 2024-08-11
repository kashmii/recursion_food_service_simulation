<?php

namespace FoodItems;

class Fettuccine extends FoodItem
{
  // カテゴリを表す定数クラス変数
  const CATEGORY = 'Pastas';
  const COOKING_TIME = 12;

  protected string $description = "delicious fettuccine";
  protected float $price = 15.0;

  // カテゴリを取得する静的メソッド
  public static function getCategory(): string
  {
    return self::CATEGORY;
  }
}
