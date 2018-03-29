<?php

if ($_GET['action'] == "set" && $_GET['name'] && isset($_GET['value'])) {
    setcookie($_GET['name'], $_GET['value'], time() + 3600);
}
if ($_GET['action'] == "del" && $_GET["name"]) {
    setcookie($_GET['name'], "", time() - 3600);
}
if ($_GET['action'] == "get" && isset($_GET['name'])) {
    foreach ($_COOKIE as $cook => $value) {
        if ($cook == $_GET['name'])
            echo $_COOKIE[$_GET['name']] . "\n";
    }
}

?>
