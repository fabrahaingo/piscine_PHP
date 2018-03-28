<?php

function filter($var){
  return ($var !== NULL && $var !== FALSE && $var !== '');
}

function ft_split($string) {
    $tab = array_filter(explode(" ", $string), 'filter');
    if ($tab)
        sort($tab);
    return $tab;
}

?>
