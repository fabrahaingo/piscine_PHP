#!/usr/bin/php
<?php

$tochange = trim($argv[1]);
$changed = preg_replace("/\s+/", " ", $tochange);
if ($changed)
    echo $changed . "\n";

?>
