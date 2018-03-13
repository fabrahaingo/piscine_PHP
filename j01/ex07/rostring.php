#!/usr/bin/php
<?php

if ($argc > 1) {
    unset($argv[0]);
    $new = trim($argv[1]);
    $tab = array_filter(explode(" ", $new));
    $clone = ' ' . $tab[0];
    unset($tab[0]);
    $string = implode(" ", $tab);
    $string .= $clone;
    echo $string . "\n";
}

?>
