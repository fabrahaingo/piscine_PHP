#!/usr/bin/php
<?php

if ($argc == 2) {
    if ($argv[1] == "mais pourquoi cette demo ?") {
        echo "Tout simplement pour qu'en feuilletant le sujet\n";
        echo "on ne s'apercoive pas de la nature de l'exo\n";
    }
    if ($argv[1] == "mais pourquoi cette chanson ?")
        echo "Parce que Kwame a des enfants";
    if ($argv[1] == "vraiment ?") {
        $array = array ("Nan c'est parce que c est le premier avril\n", "Oui il a vraiment des enfants\n");
        echo $array[array_rand($array, 1)];
    }
}

?>
