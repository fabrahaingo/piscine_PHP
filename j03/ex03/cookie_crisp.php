<?php

if ($_GET['action'] == "set" && $_GET['name'] && $_GET['value']) {
    setcookie($_GET['name'], $_GET['value'], time() + 3600);
}
if ($_GET['action'] == "del" && $_GET["name"]) {
    setcookie($_GET['name'], "", time() - 3600);
}
if ($_GET['action'] == "get" && $_COOKIE[$_GET['name']] && $_GET['name']) {
    echo $_COOKIE[$_GET['name']] . "\n";
}

?>
