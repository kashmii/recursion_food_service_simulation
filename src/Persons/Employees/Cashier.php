<?php
namespace Persons\Employees;

require_once __DIR__ . '/Employee.php';
require_once __DIR__ . '/../../FoodOrders/FoodOrder.php';
require_once __DIR__ . '/../../Restaurants/Restaurant.php';

use Persons\Employee;
use FoodOrders\FoodOrder;
use Invoices\Invoice;
use Restaurants\Restaurant;

// タイムゾーンを日本時間に設定
date_default_timezone_set('Asia/Tokyo');

class Cashier extends Employee
{
    // 関数: generateOrder(string[] ordersFromCustomer, Restaurant restaurant): FoodOrder
    public function generateOrder(array $ordersFromCustomer, Restaurant $restaurant): FoodOrder
    {
        echo "{$this->name} received the order.\n";

        $menu = $restaurant->getMenu();
        $fixedOrder = [];
        foreach ($ordersFromCustomer as $category) {
            foreach ($menu as $menuItem) {
                if ($menuItem::getCategory() === $category) {
                    $fixedOrder[] = $menuItem;
                }
            }
        }
        return new FoodOrder($fixedOrder, date("Y/m/d H:i:s"));
    }

}
