#!/usr/bin/php
<?php

date_default_timezone_set("Europe/Paris");

$day = array(
    0 => "lundi",
    1 => "mardi",
    2 => "mercredi",
    3 => "jeudi",
    4 => "vendredi",
    5 => "samedi",
    6 => "dimanche"
);
$month = array(
    1 => "janvier",
    2 => "février",
    3 => "mars",
    4 => "avril",
    5 => "mai",
    6 => "juin",
    7 => "juillet",
    8 => "août",
    9 => "septembre",
    10 => "octobre",
    11 => "novembre",
    12 => "décembre"
);
$tab = explode(" ", $argv[1]);
if (count($tab) != 5) {
    if ($argc > 1)
        echo "Wrong format\n";
    return;
}
for($i = 0; $i < 7; $i++) {
    if (strcasecmp($tab[0], $day[$i]) === 0) {
        $daythere = 1;
        $day = $i;
        break;
    }
}
for($i = 0; $i < 12; $i++) {
    if (strcasecmp($tab[2], $month[$i]) === 0) {
        $monththere = 1;
        $month = $i;
        break;
    }
}
if ($daythere != 1 || $monththere != 1) {
    echo "Wrong format\n";
    return;
}
if (preg_match("/3[01]|0[1-9]|[12][0-9]|[1-9]/", $tab[1]) === 0 ||
    preg_match("/(2[0-3]|[01][0-9]):?([0-5][0-9]):?([0-5][0-9])$/", $tab[4]) === 0 ||
    preg_match("/([0-9]{4})/", $tab[3]) === 0) {
    echo "Wrong format\n";
    return;
}
else {
    $time = explode(":", $tab[4]);
    $result = mktime($time[0], $time[1], $time[2], $month, $tab[1], $tab[3]);
    echo $result . "\n";
}

?>
