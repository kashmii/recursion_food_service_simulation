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
    $result = "";
    $totalTime = 0;
    foreach ($foodOrder as $item) {
      $result .= "{$this->name} was cooking {$item->name}.\n";
      $totalTime += $item->getCookingTime();
    }
    // 時間が加算されてない
    $result .= "{$this->name} took {$totalTime} minutes to cook.\n";
    return $result;
  }
}
