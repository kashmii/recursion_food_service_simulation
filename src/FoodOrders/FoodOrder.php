<?php
namespace FoodOrders;

require_once "src/FoodItems/FoodItem.php";

class FoodOrder
{
  // 属性: FoodItem[] items, Timestamp orderTime
  protected array $items;
  protected string $orderTime;

  protected int $estimatedTimeInMinutes;
  public function __construct(array $items)
  {
    $this->items = $items;
    $this->orderTime = date("Y/m/d H:i:s");
  }

  public function getItems()
  {
    return $this->items;
  }
}
