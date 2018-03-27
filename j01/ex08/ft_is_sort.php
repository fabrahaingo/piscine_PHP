<?php

function ft_is_sort($tab) {
    $array1 = $tab;
    $array2 = $tab;
    if ($array2)
        sort($array2);
    if ($array1 != $array2) {
        return (false);
    }
    return (true);
}

?>
