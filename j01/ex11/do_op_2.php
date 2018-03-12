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

function get_delim($string) {
    for ($i = 0; is_numeric($string[$i]); $i++);
    return ($string[$i]);
}

if ($argc < 2) {
    echo "Incorrect Parameters\n";
    return ;
}
unset($argv[0]);
foreach ($argv as $av) {
    $full_input .= $av;
}
$full_input = trim($full_input);
if (is_well_formated($full_input)) {
    str_replace(" ", "", $full_input);
    $delim = get_delim($full_input);
    for ($i = 0; is_numeric($full_input[$i]); $i++)
        $num1 .= $full_input[$i];
    $i += 1;
    for ($i; is_numeric($full_input[$i]); $i++)
        $num2 .= $full_input[$i];
    echo $num1 {$delim} $num2;
}
else
    echo "Syntax Error\n"

?>
