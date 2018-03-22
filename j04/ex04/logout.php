<?php

header('Refresh: 2; URL="index.html"');
session_start();
$_SESSION['loggued_on_user'] = "";
echo "All sessions (active or not) were killed";

?>
