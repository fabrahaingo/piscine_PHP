#!/usr/bin/php
<?php

function filter($var){
  return ($var !== NULL && $var !== FALSE && $var !== '');
}

if ($argc == 2) {
    $tab = array_filter(explode(" ", $argv[1]), 'filter');
    foreach($tab as $t)
         $result .= $t . " ";
    if ($result)
        echo trim($result) . "\n";
}

?>
