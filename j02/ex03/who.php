#!/usr/bin/php
<?php
    date_default_timezone_set("Europe/Paris");

    $file = file_get_contents("/var/run/utmpx");
    $format = "a256user/a4id/a32line/ipid/itype/I2time/a256host/i16pad";
    $file = substr($file, 628);
    while (($file = substr($file, 628)) != NULL)
    {
        $tab = unpack($format, $file);
        echo $tab[user]." ";
        echo $tab[line]." ";
        echo date("M d H:i", $tab[time1]) ."\n";
    }
    print_r($tab);

?>
