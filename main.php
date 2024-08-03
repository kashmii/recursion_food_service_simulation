<?php
spl_autoload_register( function($name) {
    // __DIR__は、現在のファイルの絶対ディレクトリパスを取得します。
    $filepath = __DIR__ . "/" . str_replace('\\', '/', $name) . ".php";
    echo "\nRequiring...." . $name . " once ($filepath).\n";
    // バックスラッシュ(\)をフロントスラッシュ(/)に置き換えます。フロントスラッシュはLinuxのファイルパスで使用されます。
    require_once $filepath;
});

