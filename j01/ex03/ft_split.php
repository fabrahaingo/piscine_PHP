<?php

function ft_split($string) {
    $tab = array_filter(explode(" ", $string));
    sort($tab);
    return $tab;
}

?>
