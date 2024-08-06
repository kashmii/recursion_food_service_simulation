<?php

namespace Persons\Customers;

require_once "src/Persons/Person.php";
require_once "src/Restaurants/Restaurant.php";
require_once "src/Invoices/Invoice.php";

use Persons\Person;
use Restaurants\Restaurant;
use Invoices\Invoice;

class Customer extends Person
{
  // 属性: array interestedFoodItems
  protected array $interestedFoodItems;

  public function __construct(string $name, int $age, string $address, array $interestedFoodItems)
  {
    // 親クラスのコンストラクタを呼び出す
    parent::__construct($name, $age, $address);
    $this->interestedFoodItems = $interestedFoodItems;
  }

  // 関数: interestedCategories(Restaurant restaurant): string[]
  //   restaurant のmenuと interestedFoodItems を比較して、共通する料理を返す
  public function interestedCategories(Restaurant $restaurant): array
  {
    $menu_in_lower = $restaurant->getMenuInLower();
    $result = array_filter($this->interestedFoodItems, function ($interestedFoodItem) use ($menu_in_lower) {
      return in_array(strtolower($interestedFoodItem), $menu_in_lower);
    }, ARRAY_FILTER_USE_KEY);

    return $result;
  }

  function order(Restaurant $restaurant): Invoice
  {
    // 返り値例: "CheeseBurger x 2, Spaghetti x 1"
    function formatOrder(array $order)
    {
      $formattedItems = [];
      foreach ($order as $item => $quantity) {
        $formattedItems[] = "$item x $quantity";
      }
      return implode(', ', $formattedItems);
    }

    // 以下の文章を出力する
    $keys = array_keys($this->interestedFoodItems);
    // カンマ区切りの文字列に変換
    $keysString = implode(", ", $keys);
    echo "{$this->name} wanted to eat {$keysString}.\n";

    $array = $this->interestedCategories($restaurant);
    $orderString = formatOrder($array);
    echo "{$this->name} looking at the menu, and ordered {$orderString}.\n";

    // TODO: 修正要
    return new Invoice(0, "2021-01-01 12:00:00", 30);
  }
};

