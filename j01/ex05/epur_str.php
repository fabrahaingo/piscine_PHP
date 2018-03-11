#!/usr/bin/php
<?php

if ($argc == 2) {
    $trimed = trim($argv[1]);
    $result = preg_replace('/\s+/', ' ', $trimed);
    echo $result;
}

?>
