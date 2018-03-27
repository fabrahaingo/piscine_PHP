#!/usr/bin/php
<?php

$init = curl_init($argv[1]);
curl_setopt($init, CURLOPT_RETURNTRANSFER, true);
curl_setopt($init, CURLOPT_BINARYTRANSFER, true);
$code = curl_exec($init);
curl_close($init);
$image = preg_match_all('#<img.*?>#is', $code, $array);
print_r($array[0]);

?>
