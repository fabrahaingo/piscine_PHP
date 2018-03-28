#!/usr/bin/php
<?php

function filter($var){
  return ($var !== NULL && $var !== FALSE && $var !== '');
}

if ($argc > 1) {
    unset($argv[0]);
    $new = trim($argv[1]);
    $tab = array_filter(explode(" ", $new), 'filter');
    if (count($tab) != 1)
        $clone = ' ' . $tab[0];
    else
        $clone = $tab[0];
    unset($tab[0]);
    $string = implode(" ", $tab);
    $string .= $clone;
    echo $string . "\n";
}

?>
