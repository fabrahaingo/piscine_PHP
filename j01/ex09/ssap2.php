#!/usr/bin/php
<?php

if ($argc > 1) {
    unset($argv[0]);
    foreach ($argv as $v) {
        $trimed = trim($v);
        $result = preg_replace('/\s+/', ' ', $trimed);
        $tab = array_filter(explode(' ', $result));
        foreach ($tab as $t) {
            if (ord($t[0]) < 48 || (ord($t[0]) >= 58 && ord($t[0]) <= 64) ||
            (ord($t[0]) >= 91 && ord($t[0]) <= 96) || ord($t[0] > 123))
                $sp_char[] = $t;
            else if (ord($t[0]) < 65) {
                $num[] = $t;
            }
            else
                $char[] = $t;
        }
    }
    if ($char) {
        natcasesort($char);
        foreach ($char as $c)
            echo $c . "\n";
    }
    if ($num) {
        sort($num, SORT_STRING);
        foreach ($num as $n)
            echo $n . "\n";
    }
    if ($sp_char) {
        sort($sp_char);
        foreach ($sp_char as $sp)
            echo $sp . "\n";
    }
}

?>
