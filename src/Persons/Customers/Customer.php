<?php
class Customer extends Person
{
  // 引数はレストランになる Restaurant
  public function interestedCategories(): array
  {
    $stringArray = ["apple", "banana", "cherry"];

    // 配列を返す
    return $stringArray;
  }

  // order(Restaurant, array categories): Invoice というメソッドを作成
}

