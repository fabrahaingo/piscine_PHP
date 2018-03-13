#!/usr/bin/php
<?php

if ($argc > 2) {
    unset($argv[0]);
    $tofind = $argv[1];
    foreach ($argv as $av) {
        $tab = explode(":", $av);
        if ($tab[0] == $tofind)
            $result = $tab[1];
    }
    if ($result != NULL)
        echo $result . "\n";
}

?>
