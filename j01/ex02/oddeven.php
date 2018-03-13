#!/usr/bin/php
<?php

while ($stdin && !feof($stdin)) {
    echo "Entrez un nombre: ";
    $num = fgets($stdin);
    if ($num == NULL) {
        echo "^D\n";
        return;
    }
    $num = str_replace("\n", "", "$num");
    if (is_numeric($num)) {
        if ($num % 2 == 0)
            echo "Le chiffre " . $num . " est Pair\n";
        else
            echo "Le chiffre " . $num . " est Impair\n";
    } else
        echo "'" . $num . "' n'est pas un chiffre\n";
}

?>
