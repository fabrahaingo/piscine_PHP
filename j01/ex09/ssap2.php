#!/usr/bin/php
<?php

function filter($var) {
  return ($var !== NULL && $var !== FALSE && $var !== '');
}

function ft_swap(&$x, &$y) {
    list($x, $y) = array($y, $x);
}

function is_sort($word1, $word2) {
    $word1 = strtolower($word1);
    $word2 = strtolower($word2);
    $alphabet = array_filter(explode(" ", "a b c d e f g h i j k l m n o p q r s t u v w x y z 0 1 2 3 4 5 6 7 8 9"), 'filter');
    $length = strlen($word1) < strlen($word2) ? strlen($word1) : strlen($word2);
    for ($i = 0; $i < $length; $i++)
    {
        $short_word1 = substr($word1, $i, 1);
        $short_word2 = substr($word2, $i, 1);
        $pos_word1 = array_search($short_word1, $alphabet);
        $pos_word2 = array_search($short_word2, $alphabet);
        if ($pos_word1 === false)
            $pos_word1 = ord($short_word1) + 100;
        else {}
        if ($pos_word2 === false)
            $pos_word2 = ord($short_word2) + 100;
        else {}
        if ($pos_word1 > $pos_word2)
            return false;
        if ($pos_word1 < $pos_word2)
            return true;
    }
    if (strlen($word1) <= strlen($word2))
        return true;
    else
        return false;
}

$result = array();
$i = 0;
if ($argc > 1) {
    unset($argv[0]);
    foreach ($argv as $v) {
        $trimed = trim($v);
        $tab = array_filter(explode(' ', $trimed), 'filter');
        $result = array_merge($result, $tab);
    }
    usort($result, "is_sort");
    $i++;
    $result = array_reverse($result);
    foreach ($result as $word)
        echo $word . "\n";
}


?>
