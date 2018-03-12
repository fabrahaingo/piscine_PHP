#!/usr/bin/php
<?php

function is_well_formated($string) {
    $sign = 0;
    $step = 0;
    for ($i = 0; is_numeric($string[$i]); $i++);
    for ($i; !is_numeric($string[$i]); $i++) {
        if (($string[$i] == '+' || $string[$i] == '-' || $string[$i] == '*' || $string[$i] == '/' || $string[$i] == '%') && $sign == 0)
            $sign = 1;
        else if (($string[$i] == '+' || $string[$i] == '-' || $string[$i] == '*' || $string[$i] == '/' || $string[$i] == '%') && $sign != 0)
            return (false);
        else if ($string[$i] == ' ')
            continue;
        else
            return (false);
    }
    for ($i; is_numeric($string[$i]); $i++);
    return (true);
}

function get_gelim($string) {
    
}

if ($argc < 2) {
    echo "Incorrect Parameters\n";
    return ;
}
unset($argv[0]);
foreach ($argv as $av) {
    $full_imput .= $av;
}
trim($full_imput);
if (is_well_formated($full_imput)) {
    str_replace(" ", "", $full_imput);
    $tab{}
}
else
    echo "Syntax Error\n"

?>
