<?php
// Include or autoload the file containing the Persons\Customer class
spl_autoload_extensions(".php");
spl_autoload_register(function ($class) {
    // __DIR__は、現在のファイルの絶対ディレクトリパスを取得します。
    $base_dir = __DIR__ . "/src/";
    $file = $base_dir . str_replace("\\", "/", $class) . ".php";
    if (file_exists($file)) {
        require_once $file;
    }
});

// 1. 食べ物を4つ作成
$cheeseBurger = new \FoodItems\CheeseBurger();
$fettuccine = new \FoodItems\Fettuccine();
$hawaiianPizza = new \FoodItems\HawaiianPizza();
$spaghetti = new \FoodItems\Spaghetti();

// 2. 従業員を2人作成
$Mike = new \Persons\Employees\Chef("Mike Smith", 40, "Osaka", 1, 30);
$Anna = new \Persons\Employees\Cashier("Anna Hoshino", 25, "Tokyo", 2, 20);

// 3. レストランを作成
$saizeriya = new \Restaurants\Restaurant(
    [
        $cheeseBurger,
        $fettuccine,
        $hawaiianPizza,
        $spaghetti
    ],
    [
        $Mike,
        $Anna
    ]
);

// 4. interestedMapを作成
$interestedTastesMap = [
    "Margherita" => 1,
    "CheeseBurger" => 2,
    "Spaghetti" => 1,
];

// 5. 顧客を作成し、客に注文させ、請求書を出力する
$Tom = new \Persons\Customers\Customer("Tom", 20, "Tokyo", $interestedTastesMap);

print_r($Tom->interestedCategories($saizeriya));

$invoice = $Tom->order($saizeriya);

$invoice->printInvoice();
