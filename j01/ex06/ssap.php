#!/usr/bin/php
<?php

if ($argc > 1) {
    unset($argv[0]);
    foreach ($argv as $v) {
        $trimed = trim($v);
        $result = preg_replace('/\s+/', ' ', $trimed);
        $tab = array_filter(explode(' ', $result));
        foreach ($tab as $t)
            $final_tab[] = $t;
    }
    sort($final_tab);
    foreach ($final_tab as $ft) {
        echo $ft . "\n";
    }
}

?>
