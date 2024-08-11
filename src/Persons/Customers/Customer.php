<?php

namespace Persons\Customers;

use Persons\Person;
use Restaurants\Restaurant;
use Invoices\Invoice;

class Customer extends Person
{
  // 属性: array interestedFoodItemsMap
  protected array $interestedFoodItemsMap;

  public function __construct(string $name, int $age, string $address, array $interestedFoodItemsMap)
  {
    // 親クラスのコンストラクタを呼び出す
    parent::__construct($name, $age, $address);
    $this->interestedFoodItemsMap = $interestedFoodItemsMap;
  }

  // 関数: interestedCategories(Restaurant restaurant): string[]
  //   restaurant のmenuと interestedFoodItemsMap を比較して、共通する料理を返す

  // 現状の返り値例 これは間違い
  // Array
  // (
  //   [CheeseBurger] => 2
  //   [Spaghetti] => 1
  // )

  // 変更後の返り値例
  // Array
  // (
  // "CheeseBurger", "CheeseBurger", "Spaghetti"
  // )

  public function interestedCategories(Restaurant $restaurant): array
  {
    $orderCategories = [];
    foreach ($this->interestedFoodItemsMap as $key => $value) {
      if ($restaurant->hasMenu($key)) {
        for ($i = 0; $i < $value; $i++) {
          array_push($orderCategories, $key);
        }
      }
    }
    // echo "orderCategories\n";
    // print_r($orderCategories);
    return $orderCategories;
  }

  function order(Restaurant $restaurant): Invoice
  {
    // 返り値例: "CheeseBurger x 2, Spaghetti x 1"
    function formatOrder(array $order)
    {
      $formattedItems = [];
      $itemCounts = array_count_values($order);
      foreach ($itemCounts as $item => $count) {
        $formattedItems[] = "$item x $count";
      }
      return implode(', ', $formattedItems);
    }

    // 以下の文章を出力する
    $keys = array_keys($this->interestedFoodItemsMap);
    // カンマ区切りの文字列に変換
    $keysString = implode(", ", $keys);
    echo "{$this->name} wanted to eat {$keysString}.\n";

    $commonFoodItems = $this->interestedCategories($restaurant);
    $orderString = formatOrder($commonFoodItems);
    echo "{$this->name} looking at the menu, and ordered {$orderString}.\n";

    return $restaurant->order($commonFoodItems);
  }
};
