<?php

namespace Persons\Employees;

use Persons\Employee;
use FoodOrders\FoodOrder;
use Invoices\Invoice;
use Restaurants\Restaurant;

// タイムゾーンを日本時間に設定
date_default_timezone_set('Asia/Tokyo');

class Cashier extends Employee
{
    // 関数: generateOrder(string[] orderedItems, Restaurant restaurant): FoodOrder
    public function generateOrder(array $orderedItems): FoodOrder
    {
        // orderedItems がそのままFoodOrderの引数になる
        echo "{$this->name} received the order.\n\n";
        // 第1引数は FoodItem クラスのインスタンスの配列
        $foodOrder = new FoodOrder($orderedItems);
        return $foodOrder;
    }

    // 関数: generateInvoice(FoodOrder order): FoodOrder
    public function generateInvoice(FoodOrder $order): Invoice
    {
        $invoice = new Invoice($order->getOrderTime());

        foreach ($order->getItems() as $item) {
            $invoice->addPrice($item->getPrice());
            $invoice->addEstimatedTimeInMinutes($item::COOKING_TIME);
        }

        echo "{$this->getName()} made the invoice.\n";
        return $invoice;
    }
}
