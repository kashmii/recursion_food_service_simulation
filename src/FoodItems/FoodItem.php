<?php
abstract class FoodItem

{
  // 属性: name, description, price
  protected string $name;
  protected string $description;
  protected float $price;

  public function __construct(string $name, string $description, float $price)
  {
    $this->name = $name;
    $this->description = $description;
    $this->price = $price;
  }

  // FoodItem を拡張した具象クラスは、バーガーやピザ、パスタなど特定の食品カテゴリを表現します
  // 参照: 問題ページ
  // 関数: getCategory(): string
  abstract public static function getCategory(): string;
}
