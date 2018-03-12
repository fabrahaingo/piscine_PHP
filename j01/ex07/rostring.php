#!/usr/bin/php
<?php

if ($argc > 1) {
    unset($argv[0]);
    $tab = array_filter(explode(" ", $argv[1]));
    $clone = ' ' . $tab[0];
    unset($tab[0]);
    $string = implode(" ", $tab);
    $string .= $clone;
    print($string);
}

?>
