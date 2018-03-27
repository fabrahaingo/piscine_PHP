<?php

function ft_split($string) {
    $tab = array_filter(explode(" ", $string));
    if ($tab)
        sort($tab);
    return $tab;
}

?>
