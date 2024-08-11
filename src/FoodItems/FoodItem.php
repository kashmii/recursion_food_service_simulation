<?php
namespace FoodItems;

abstract class FoodItem

{
  // 属性: name, description, price
  protected string $name;
  protected string $description;
  protected float $price;

  public function __construct()
  {
    $this->name = $this->generateName();
    $this->description = $this->getDescription();
    $this->price = $this->getPrice();
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getDescription(): string
  {
    return $this->description;
  }

  public function getPrice(): float
  {
    return $this->price;
  }

  private function generateName():string {
    $tmp =  explode('\\', get_called_class());
    return end($tmp);
}

  // FoodItem を拡張した具象クラスは、バーガーやピザ、パスタなど特定の食品カテゴリを表現します
  // 参照: 問題ページ
  // 関数: getCategory(): string
  abstract public static function getCategory(): string;
}
