#!/usr/bin/php
<?php

if ($argc == 4) {
    $op = str_replace(" ", "", $argv[2]);
    if ($op == '+')
        $result = $argv[1] + $argv[3];
    else if ($op == '-')
        $result = $argv[1] - $argv[3];
    else if ($op == '/')
        $result = $argv[1] / $argv[3];
    else if ($op == '*')
        $result = $argv[1] * $argv[3];
    else if ($op == '%')
        $result = $argv[1] % $argv[3];
    echo $result . "\n";
}
else {
    echo "Incorrect Parameters\n";
}

?>
