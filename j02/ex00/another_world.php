<?php

$tochange = trim($argv[1]);
$changed = preg_replace("/\s+/", " ", $tochange);
echo $changed . "\n";

?>
