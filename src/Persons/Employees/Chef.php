<?php
namespace Persons\Employees;

require_once __DIR__ . '/Employee.php';
require_once __DIR__ . '/../../FoodOrders/FoodOrder.php';

use Persons\Employee;
use FoodOrders\FoodOrder;

class Chef extends Employee
{
  // 関数: prepareFood(string foodName): String
  public function prepareFood(FoodOrder $foodOrder): string
  {
    // $foodOrder の items を取得し、それらの名前を取得
    // その名前を規定の文字列に追加し、返す
    $totalTime = 0;
    if (is_array($foodOrder->getItems()) || $foodOrder instanceof \Traversable) {
      foreach ($foodOrder->getItems() as $item) {
        // 特定クラスのインスタンスからそのクラス名の文字列を取得
        $class_name = get_class($item);
        echo "{$this->name} was cooking {$class_name}.\n";
        $totalTime += $item::COOKING_TIME;
      }
    }
    return "{$this->name} took {$totalTime} minutes to cook.\n";
  }
}
