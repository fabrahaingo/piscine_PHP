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
        if (!$tab[$i + 1])
            return ($tab);
        if (strcmp($tab[$i][$category], $tab[$i + 1][$category]) > 0) {
            $tmp = $tab[$i];
            $tab[$i] = $tab[$i + 1];
            $tab[$i + 1] = $tmp;
            $i = 0;
        }
    }
}

$stdin = fopen("php://stdin", "r");
$tab = fill_tab($stdin);
if ($argc == 2) {
    if ($argv[1] == "moyenne") {
        foreach ($tab as $t) {
            if (is_numeric($t[note]) && $t[noteur] != "moulinette") {
                $total += $t[note];
                $nb_grades++;
            }
        }
        $result = $total / $nb_grades;
        if ($result != NULL)
            echo $result . "\n";
    }
    else if ($argv[1] == "moyenne_user") {
        $tab = sort_alpha("user", $tab);
        for ($i = 0; $tab[$i]; $i++) {
            while ($tab[$i][user] == $tab[$i + 1][user]) {
                if (is_numeric($tab[$i][note]) && $tab[$i][noteur] != "moulinette") {
                    $total += $tab[$i][note];
                    $nb_grades++;
                }
                $i++;
            }
            if (is_numeric($tab[$i][note]) && $tab[$i][noteur] != "moulinette") {
                $total += $tab[$i][note];
                $nb_grades++;
            }
            if ($nb_grades != NULL) {
                $result = $total / $nb_grades;
                echo $tab[$i][user] . ":" . $result . "\n";
            }
            $total = 0;
            $nb_grades = 0;
        }
    }
    else if ($argv[1] == "ecart_moulinette") {
        $tab = sort_alpha("user", $tab);
        for ($i = 0; $tab[$i]; $i++) {
            while ($tab[$i][user] == $tab[$i + 1][user]) {
                if (is_numeric($tab[$i][note]) && $tab[$i][noteur] != "moulinette") {
                    $total += $tab[$i][note];
                    $nb_diff++;
                }
                else if (is_numeric($tab[$i][note]) && $tab[$i][noteur] == "moulinette") {
                    $total_moul += $tab[$i][note];
                    $nb_moul++;
                }
                $i++;
            }
            if (is_numeric($tab[$i][note]) && $tab[$i][noteur] != "moulinette") {
                $total += $tab[$i][note];
                $nb_diff++;
            }
            else if (is_numeric($tab[$i][note]) && $tab[$i][noteur] == "moulinette") {
                $total_moul += $tab[$i][note];
                $nb_moul++;
            }
            if ($nb_diff != NULL && $nb_moul != NULL) {
                $result = ($total / $nb_diff) - ($total_moul / $nb_moul);
                echo $tab[$i][user] . ":" . $result . "\n";
            }
            $total = 0;
            $nb_diff = 0;
            $total_moul = 0;
            $nb_moul = 0;
        }
    }
}
?>
