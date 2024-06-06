<?php
function printMultiplicationTable($rows = 9, $cols = 9) {
    $maxProduct = $rows * $cols;
    $maxWidth = strlen((string) $maxProduct) + 1;

    for ($i = 1; $i <= $rows; $i++) {
        for ($j = 1; $j <= $cols; $j++) {
            $product = $i * $j;
            printf("$i x $j = "."%{$maxWidth}d", $product);
            echo " | ";
        }
        echo PHP_EOL;
    }
}

// 獲取命令行參數
$arguments = $argv;
if (count($arguments) == 3) {
    $rows = intval($arguments[1]);
    $cols = intval($arguments[2]);
    printMultiplicationTable($rows, $cols);
} else {
    printMultiplicationTable();
}

