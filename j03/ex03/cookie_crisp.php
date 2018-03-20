<?php

if ($_GET['action'] === "set" && $_GET['name'] && $_GET['value']) {
    setcookie($_GET['name'], $_GET['value']);
}
else if ($_GET['action'] === "get" && $_COOKIE[$_GET['name']] && $_GET['name']) {
    echo $_COOKIE[$_GET['name']] . "\n";
}
else if ($_GET['action'] === "del" && $_COOKIE($_GET['name'])) {
    setcookie($_GET['name'], "", 1);
}
return;

?>
