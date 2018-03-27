#!/usr/bin/php
<?php
    date_default_timezone_set("Europe/Paris");

    $file = file_get_contents("/var/run/utmpx");
    $format = "a256user/a4id/a32line/ipid/itype/I2time/a256host/i16pad";
    $file = substr($file, 628);
    while (($file = substr($file, 628)) != NULL)
    {
        $tab = unpack($format, $file);
        if ($tab[type] == 7) {
            $result[] = $tab[user] . " " . $tab[line] . "  " . date("M d H:i", $tab[time1]);
        }
    }
    if ($result) {
        sort($result);
        foreach ($result as $r) {
            echo $r . "\n";
        }
    }

?>
