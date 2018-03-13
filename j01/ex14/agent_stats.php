#!/usr/bin/php
<?php

function fill_tab($string) {
    while ($line = fgets($string)) {
        $tmp = explode (";", $line);
        $tab[] = array(
            "user" => $tmp[0],
            "note" => $tmp[1],
            "noteur" => $tmp[2],
            "feedback" => trim($tmp[3]),
        );
    }
    return ($tab);
}

function sort_alpha($category, $tab) {
    for ($i = 1; $tab[$i]; $i++) {
        print("coucou");
        if ($tab[$i + 1] && (strcmp($tab[$i][$category], $tab[$i + 1][$category]) < 0)) {
            $tmp = $tab[$i];
            $tab[$i] = $tab[$i + 1];
            $tab[$i + 1] = $tmp;
            $i = 0;
            print('moved ' . $y++ . " times\n");
        }
    }
}

$stdin = fopen("php://stdin", "r");
$tab = fill_tab($stdin);
sort_alpha($user, $tab);
print_r($tab[1]);
#foreach($tab as $t)
#    print_r($t);
if ($argc == 2) {
    if ($argv[1] == "moyenne") {
        while ($line = fgets($stdin)) {
            $tab = explode (";", $line);
            if (is_numeric($tab[1])) {
                $total += $tab[1];
                $nb_grades++;
            }
        }
        $result = $total / $nb_grades;
    }
    if ($result != NULL) {
        echo $result . "\n";
    }
}
?>
