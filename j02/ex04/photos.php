#!/usr/bin/php
<?php

function getFile($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $tmp = curl_exec($ch);
    curl_close($ch);
    if ($tmp != false){
        return $tmp;
    }
}

function getDirName($fullName) {
    if (preg_match('#https?://(.*)#', $fullName, $tab))
        return ($tab[1]);
    else
        return ($fullName);
}

function getFileName($url) {
    $file = strrchr($url, '/');
    $file = substr($file, 1);
    return ($file);
}

$init = curl_init($argv[1]);
curl_setopt($init, CURLOPT_RETURNTRANSFER, true);
curl_setopt($init, CURLOPT_BINARYTRANSFER, true);
$code = curl_exec($init);
curl_close($init);
$there = preg_match_all('#<img.*?>#is', $code, $array);
if ($there != FALSE) {
    $dir_name = getDirName($argv[1]);
    if (file_exists($dir_name)) {
        $files = glob("./" . $dir_name . "/*");
        foreach ($files as $name)
            unlink($name);
        rmdir($dir_name);
    }
    mkdir($dir_name . "/");
    foreach($array[0] as $ar) {
        if (preg_match('#src="(https?://)(.*?)"#i', $ar, $tab)) {
            $url = $tab[2];
        }
        else if (preg_match('#src="(.*?)"#i', $ar, $tab)) {
            $url = $argv[1] . $tab[1];
        }
        $file = getFileName($url);
        file_put_contents($dir_name . "/" . $file, getFile($url));
    }
}

?>
