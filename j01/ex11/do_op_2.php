#!/usr/bin/php
<?php

if ($argc < 2) {
    echo "Incorrect Parameters\n";
    return ;
}
$str = str_replace(" ", "", $argv[1]);
$num1 = intval($str);
$delim = $str[strlen($num1)];
$num2 = substr($str, strlen($num1) + 1);
if (is_numeric($num2)) {
    if ($delim == '+')
        echo $num1 + $num2;
    else if ($delim == '-')
        echo $num1 - $num2;
    else if ($delim == '*' && $num2 != 0)
        echo $num1 * $num2;
    else if ($delim == '/' && $num2 != 0)
        echo $num1 / $num2;
    else if ($delim == '%' && $num2 != 0)
        echo $num1 % $num2;
    else if ($num2 == 0)
        echo "Division by zero not permitted\n";
    else
        echo "Syntax Error\n";
}
else
    echo "Syntax Error\n";

?>
