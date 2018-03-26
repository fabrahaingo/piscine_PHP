#!/usr/bin/php
<?php

function upper($matches) {
    print_r($matches);
    return $matches[1].strtoupper($matches[2]).$matches[3];
}

function ft_in_link($match) {
    $match[0] = preg_replace_callback('#(")(.*)(")#i', 'upper', $match[0]);
    $match[0] = preg_replace_callback('#(>)(.*?)(<)#i', 'upper', $match[0]);
    return ($match[0]);

}

$rawfile = fopen($argv[1], "r");
$file = fread($rawfile, filesize($argv[1]));
$file = preg_replace_callback('#<a.*>.*</a>#i', 'ft_in_link', $file);
echo $file . "\n";
fclose($rawfile);

?>
