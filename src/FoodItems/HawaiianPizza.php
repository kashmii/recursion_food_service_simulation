<?php
namespace FoodItems;

require_once "src/FoodItems/FoodItem.php";

class HawaiianPizza extends FoodItem
{
  // カテゴリを表す定数クラス変数
  const CATEGORY = 'Pizza';

  // カテゴリを取得する静的メソッド
  public static function getCategory(): string
  {
    return self::CATEGORY;
  }
}

