#!/usr/bin/php
<?php

if ($argc < 2) {
    echo "Incorrect Parameters\n";
    return ;
}
$str = str_replace("\n", "", $argv[1]);
$num1 = intval($str);
print($num1);
$delim = $str[strlen($num1)];
$num2 = substr($str, (strlen($num1)));
if ($delim == '+')
    echo $num1 + $num2;
else if ($delim == '-')
    echo $num1 - $num2;
else if ($delim == '*')
    echo $num1 * $num2;
else if ($delim == '/')
    echo $num1 / $num2;
else if ($delim == '%')
    echo $num1 % $num2;
else
    echo "Syntax Error\n"

?>
