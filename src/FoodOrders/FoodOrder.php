<?php

namespace FoodOrders;

class FoodOrder
{
  // 属性: FoodItem[] items, Timestamp orderTime
  private array $items = [];
  protected string $orderTime;

  protected int $estimatedTimeInMinutes;
  public function __construct(array $items)
  {
    $this->setItemArray($items);
    $this->orderTime = date("Y/m/d H:i:s");
  }

  /**
   * 文字列の配列から、FoodItemクラスのインスタンスをitemsに格納する
   */
  private function setItemArray(array $items): void
  {
    foreach ($items as $item) {
      $fullClassName = "FoodItems\\" . $item;
      array_push($this->items, new $fullClassName());
    }
  }

  public function getItems()
  {
    return $this->items;
  }

  public function getOrderTime()
  {
    return $this->orderTime;
  }
}
