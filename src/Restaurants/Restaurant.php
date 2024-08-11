<?php

namespace Restaurants;

use Persons\Employees\Cashier;
use Persons\Employees\Chef;
use Invoices\Invoice;

date_default_timezone_set('Asia/Tokyo');

class Restaurant
{
  // 属性: Employee[] employees, FoodItemp[] menu
  protected array $menu;
  protected array $employees;

  public function __construct(array $menu, array $employees)
  {
    $this->menu = $menu;
    $this->employees = $employees;
  }

  public function getMenu(): array
  {
    return $this->menu;
  }

  public function getMenuInLower(): array
  {
    $stringMenu = array_map(function ($element) {
      // class名からFoodItems\を削除(もともとは fooditems\cheeseburger になっている)
      return str_replace('FoodItems\\', '', $element::class);
    }, $this->menu);
    return array_map('strtolower', $stringMenu);
  }

  // 関数: order(String[] orderedItems): Invoice
  // ・cashier にレジ打ちをさせる
  // ・foodOrder を作成させる
  // ・chef に料理を作らせる
  // ・料理の合計金額, 注文時刻, 予想到着時間を出させる
  public function order(array $orderedItems): Invoice
  {
    $cashier = $this->getCashier();

    // 返り値: FoodOrder
    $foodOrder = $cashier->generateOrder($orderedItems, $this);

    // 料理の数だけ chef にprepareFood をさせる
    $chef = $this->getChef();

    echo $chef->prepareFood($foodOrder);

    return $cashier->generateInvoice($foodOrder);
  }

  // 従業員からcashierを取得
  private function getCashier(): Cashier | string
  {
    foreach ($this->employees as $employee) {
      if ($employee instanceof \Persons\Employees\Cashier) {
        return $employee;
      }
    }
    return "No cashier found";
  }

  // 従業員からchefを取得
  private function getChef(): Chef | string
  {
    foreach ($this->employees as $employee) {
      if ($employee instanceof \Persons\Employees\Chef) {
        return $employee;
      }
    }
    return "No chef found";
  }

  public function hasMenu(string $category): bool
  {
    // print("hasMenu\n");
    // print_r($this->menu);
    foreach ($this->menu as $menu_) {
      if ($menu_->getName() == $category) {
        return True;
      }
    }
    return False;
  }
}
