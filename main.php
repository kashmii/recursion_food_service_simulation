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
$cheeseBurger = new \FoodItems\CheeseBurger("Cheese Burger", "delicious cheese burger", 10);
$fettuccine = new \FoodItems\Fettuccine("Fettuccine", "delicious fettuccine", 15);
$hawaiianPizza = new \FoodItems\HawaiianPizza("Hawaiian Pizza", "delicious hawaiian pizza", 20);
$spaghetti = new \FoodItems\Spaghetti("Spaghetti", "delicious spaghetti", 18);

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
$Tom = new \Persons\Customer("Tom", 20, "Tokyo", $interestedTastesMap);

print_r($Tom->interestedCategories($saizeriya));

// TODO: 各料理に所要時間を追加する
