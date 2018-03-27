#!/usr/bin/php
<?php

if ($argc == 2) {
    $tab = array_filter(explode(" ", $argv[1]));
    foreach($tab as $t)
         $result .= $t . " ";
    if ($result)
        echo trim($result) . "\n";
}

?>
